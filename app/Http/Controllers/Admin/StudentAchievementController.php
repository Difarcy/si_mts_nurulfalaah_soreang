<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStudentAchievementRequest;
use App\Http\Requests\Admin\UpdateStudentAchievementRequest;
use App\Models\StudentAchievement;
use App\Core\Services\FileUploadService;
use App\Core\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentAchievementController extends Controller
{
    public function __construct(
        protected FileUploadService $fileUploadService
    ) {
    }

    public function index(Request $request): View
    {
        $query = StudentAchievement::query();

        if ($search = trim((string) $request->get('q'))) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('nama_siswa', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($jenis = $request->get('jenis')) {
            $query->where('jenis_prestasi', $jenis);
        }

        if ($tingkat = $request->get('tingkat')) {
            $query->where('tingkat_prestasi', $tingkat);
        }

        // status filter dihapus dari UI

        switch ($request->get('sort', 'latest')) {
            case 'oldest':
                $query->orderBy('updated_at', 'asc');
                break;
            case 'title_asc':
                $query->orderBy('judul', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('judul', 'desc');
                break;
            case 'latest':
            default:
                $query->orderBy('updated_at', 'desc');
                break;
        }

        $prestasi = $query->paginate(15)->appends($request->query());

        return view('admin.pages.achievement.index', compact('prestasi'));
    }

    public function create(): View
    {
        return view('admin.pages.achievement.create');
    }

    public function store(StoreStudentAchievementRequest $request): RedirectResponse
    {
        // 1. Cek Limit PHP vs Content Length
        $contentLength = (int) ($request->server('CONTENT_LENGTH') ?? 0);
        $maxUpload = $this->parseSize(ini_get('upload_max_filesize'));
        $maxPost = $this->parseSize(ini_get('post_max_size'));

        // 2. Deteksi Silent Failure (File terbuang karena PHP Limit)
        if ($contentLength > $maxPost && empty($request->allFiles()) && empty($request->input())) {
            return redirect()->back()->withInput()->with(
                'error',
                "Upload gagal total! Ukuran data ({$this->formatBytes($contentLength)}) melebihi batas server ({$this->formatBytes($maxPost)}). Mohon kompres gambar Anda."
            );
        }

        $validated = $request->validated();

        // Handle gambar (Foto Siswa/Dokumentasi)
        if (!$request->hasFile('gambar')) {
            return redirect()->back()->withInput()->with('error', 'Foto siswa/dokumentasi wajib diupload.');
        }

        try {
            $validated['gambar'] = $this->fileUploadService->uploadImage(
                $request->file('gambar'),
                'prestasi-siswa',
                5120
            );
            \Illuminate\Support\Facades\Log::info('Gambar utama berhasil diupload', ['path' => $validated['gambar']]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Gagal upload gambar utama', ['error' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Gagal upload gambar: ' . $e->getMessage());
        }

        // Handle foto_sertifikat
        if ($request->hasFile('foto_sertifikat')) {
            try {
                $validated['foto_sertifikat'] = $this->fileUploadService->uploadImage(
                    $request->file('foto_sertifikat'),
                    'prestasi-siswa/sertifikat',
                    5120
                );
                \Illuminate\Support\Facades\Log::info('Sertifikat berhasil diupload', ['path' => $validated['foto_sertifikat']]);
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Gagal upload sertifikat: ' . $e->getMessage());
            }
        } else {
            $validated['foto_sertifikat'] = null;
        }

        $validated['is_active'] = true;

        // Default values for optional fields
        $validated['judul'] = $validated['judul'] ?? 'Prestasi Siswa';
        $validated['nama_siswa'] = $validated['nama_siswa'] ?? '-';
        $validated['kelas'] = $validated['kelas'] ?? '-';
        $validated['jenis_prestasi'] = $validated['jenis_prestasi'] ?? 'Non-Akademik';
        $validated['tingkat_prestasi'] = $validated['tingkat_prestasi'] ?? 'Sekolah';
        $validated['tanggal_prestasi'] = $validated['tanggal_prestasi'] ?? now();

        StudentAchievement::create($validated);

        return redirect()->route('cpanel.prestasi-siswa.index')
            ->with('success', NotificationService::success('created', 'prestasi siswa'));
    }

    // Helper untuk parse size string (2M -> 2097152)
    private function parseSize($size)
    {
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size);
        $size = preg_replace('/[^0-9\.]/', '', $size);
        if ($unit) {
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        }
        return round($size);
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public function edit(StudentAchievement $prestasiSiswa): View
    {
        return view('admin.pages.achievement.edit', compact('prestasiSiswa'));
    }

    public function update(UpdateStudentAchievementRequest $request, StudentAchievement $prestasiSiswa): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->boolean('delete_gambar') && !$request->hasFile('gambar')) {
            return redirect()->back()->withInput()->with('error', 'Jika gambar dihapus, Anda wajib mengupload gambar pengganti.');
        }

        if (!$prestasiSiswa->gambar && !$request->hasFile('gambar')) {
            return redirect()->back()->withInput()->with('error', 'Foto siswa/dokumentasi wajib diupload.');
        }

        // Handle gambar
        if ($request->hasFile('gambar')) {
            $this->fileUploadService->deleteImage($prestasiSiswa->gambar);
            try {
                $validated['gambar'] = $this->fileUploadService->uploadImage(
                    $request->file('gambar'),
                    'prestasi-siswa',
                    5120
                );
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }
        } elseif ($request->boolean('delete_gambar')) {
            $this->fileUploadService->deleteImage($prestasiSiswa->gambar);
            $validated['gambar'] = null;
        }

        // Handle foto_sertifikat
        if ($request->hasFile('foto_sertifikat')) {
            $this->fileUploadService->deleteImage($prestasiSiswa->foto_sertifikat);
            try {
                $validated['foto_sertifikat'] = $this->fileUploadService->uploadImage(
                    $request->file('foto_sertifikat'),
                    'prestasi-siswa/sertifikat',
                    5120
                );
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }
        } elseif ($request->boolean('delete_foto_sertifikat')) {
            $this->fileUploadService->deleteImage($prestasiSiswa->foto_sertifikat);
            $validated['foto_sertifikat'] = null;
        }

        $validated['is_active'] = $request->has('is_active') ? true : $prestasiSiswa->is_active;
        // urutan tidak digunakan lagi

        $prestasiSiswa->update($validated);

        return redirect()->route('cpanel.prestasi-siswa.index')
            ->with('success', NotificationService::success('updated', 'prestasi siswa'));
    }

    public function destroy(StudentAchievement $prestasiSiswa): RedirectResponse
    {
        $this->fileUploadService->deleteImage($prestasiSiswa->gambar);
        $this->fileUploadService->deleteImage($prestasiSiswa->foto_sertifikat);
        $prestasiSiswa->delete();

        return redirect()->route('cpanel.prestasi-siswa.index')
            ->with('success', NotificationService::success('deleted', 'prestasi siswa'));
    }
}
