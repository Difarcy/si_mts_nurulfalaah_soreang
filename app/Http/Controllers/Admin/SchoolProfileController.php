<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Core\Services\FileUploadService;
use App\Core\Services\NotificationService;
use App\Domain\Content\Services\HomeDataService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SchoolProfileController extends Controller
{
    public function __construct(
        protected FileUploadService $fileUploadService,
        protected HomeDataService $homeDataService
    ) {
    }

    public function index(): View
    {
        $schoolProfile = SchoolProfile::firstOrCreate([]);

        return view('admin.pages.profile.index', compact('schoolProfile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $schoolProfile = SchoolProfile::firstOrCreate([]);

        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'gambar_sekolah' => 'nullable|image|max:5120', // 5MB
            'deskripsi_sekolah' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'kepala_sekolah_nama' => 'nullable|string|max:255',
            'kepala_sekolah_sambutan' => 'nullable|string',
            'struktur_organisasi' => 'nullable|image|max:5120', // 5MB
            'kepala_sekolah_foto' => 'nullable|image|max:5120', // 5MB
            'delete_gambar_sekolah' => 'nullable|boolean',
            'delete_struktur_organisasi' => 'nullable|boolean',
            'delete_kepala_sekolah_foto' => 'nullable|boolean',
        ]);

        // Handle Gambar Sekolah
        if ($request->hasFile('gambar_sekolah')) {
            if ($schoolProfile->gambar_sekolah) {
                $this->fileUploadService->deleteImage($schoolProfile->gambar_sekolah);
            }
            try {
                $validated['gambar_sekolah'] = $this->fileUploadService->uploadImage(
                    $request->file('gambar_sekolah'),
                    'school-profile/gedung',
                    5120
                );
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }
        } elseif ($request->boolean('delete_gambar_sekolah')) {
            if ($schoolProfile->gambar_sekolah) {
                $this->fileUploadService->deleteImage($schoolProfile->gambar_sekolah);
            }
            $validated['gambar_sekolah'] = null;
        }

        // Handle Struktur Organisasi
        if ($request->hasFile('struktur_organisasi')) {
            if ($schoolProfile->struktur_organisasi) {
                $this->fileUploadService->deleteImage($schoolProfile->struktur_organisasi);
            }
            try {
                $validated['struktur_organisasi'] = $this->fileUploadService->uploadImage(
                    $request->file('struktur_organisasi'),
                    'school-profile/struktur',
                    5120
                );
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }
        } elseif ($request->boolean('delete_struktur_organisasi')) {
            if ($schoolProfile->struktur_organisasi) {
                $this->fileUploadService->deleteImage($schoolProfile->struktur_organisasi);
            }
            $validated['struktur_organisasi'] = null;
        }

        // Handle Kepala Sekolah Foto
        if ($request->hasFile('kepala_sekolah_foto')) {
            if ($schoolProfile->kepala_sekolah_foto) {
                $this->fileUploadService->deleteImage($schoolProfile->kepala_sekolah_foto);
            }
            try {
                $validated['kepala_sekolah_foto'] = $this->fileUploadService->uploadImage(
                    $request->file('kepala_sekolah_foto'),
                    'school-profile/kepala-sekolah',
                    5120
                );
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }
        } elseif ($request->boolean('delete_kepala_sekolah_foto')) {
            if ($schoolProfile->kepala_sekolah_foto) {
                $this->fileUploadService->deleteImage($schoolProfile->kepala_sekolah_foto);
            }
            $validated['kepala_sekolah_foto'] = null;
        }

        $schoolProfile->update($validated);

        // Clear home data cache to reflect changes immediately
        $this->homeDataService->clearCacheOnContentUpdate();

        return redirect()->route('cpanel.profil-sekolah.index')
            ->with('success', NotificationService::success('updated', 'profil sekolah'));
    }
}
