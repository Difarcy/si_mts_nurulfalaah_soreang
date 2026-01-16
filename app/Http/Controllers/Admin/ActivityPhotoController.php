<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreActivityPhotoRequest;
use App\Http\Requests\Admin\UpdateActivityPhotoRequest;
use App\Models\ActivityPhoto;
use App\Core\Services\FileUploadService;
use App\Core\Services\NotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ActivityPhotoController extends Controller
{
    public function __construct(
        protected FileUploadService $fileUploadService
    ) {
    }

    public function index(): View
    {
        $fotos = ActivityPhoto::ordered()->paginate(15);

        return view('admin.pages.media.photo.index', compact('fotos'));
    }

    public function create(): View
    {
        return view('admin.pages.media.photo.create');
    }

    public function store(StoreActivityPhotoRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Handle multiple file upload using service
        if ($request->hasFile('gambar')) {
            $uploadedCount = 0;

            foreach ($request->file('gambar') as $index => $file) {
                try {
                    $imagePath = $this->fileUploadService->uploadImage(
                        $file,
                        'foto-kegiatan',
                        5120
                    );

                    // Create a new ActivityPhoto for each image
                    // Generate auto title with sequence
                    $baseTitle = 'Foto Kegiatan ' . date('d/m/Y');
                    $defaultJudul = $uploadedCount > 0
                        ? $baseTitle . ' (' . ($uploadedCount + 1) . ')'
                        : $baseTitle;

                    ActivityPhoto::create([
                        'judul' => $defaultJudul,
                        'deskripsi' => '',
                        'gambar' => $imagePath,
                        'urutan' => ($validated['urutan'] ?? 0) + $index,
                        'is_active' => true,  // Auto-active when uploaded
                    ]);

                    $uploadedCount++;
                } catch (\Exception $e) {
                    // If error on first image, redirect with error
                    if ($uploadedCount === 0) {
                        return redirect()->back()
                            ->withInput()
                            ->with('error', $e->getMessage());
                    }

                    // Otherwise continue with next images
                    continue;
                }
            }

            $message = $uploadedCount === 1
                ? NotificationService::success('created', 'foto kegiatan')
                : $uploadedCount . ' foto kegiatan berhasil ditambahkan.';

            return redirect()->route('cpanel.foto-kegiatan.index')
                ->with('success', $message);
        }

        // If no files uploaded, redirect back with error
        return redirect()->back()
            ->with('error', 'Silakan pilih minimal satu gambar untuk diupload.');
    }

    public function edit(ActivityPhoto $fotoKegiatan): View
    {
        return view('admin.pages.media.photo.edit', compact('fotoKegiatan'));
    }

    public function update(UpdateActivityPhotoRequest $request, ActivityPhoto $fotoKegiatan): RedirectResponse
    {
        $validated = $request->validated();

        // Handle file upload using service
        if ($request->hasFile('gambar')) {
            // Delete old image
            $this->fileUploadService->deleteImage($fotoKegiatan->gambar);

            try {
                $validated['gambar'] = $this->fileUploadService->uploadImage(
                    $request->file('gambar'),
                    'foto-kegiatan',
                    5120
                );
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', $e->getMessage());
            }
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['urutan'] = $validated['urutan'] ?? $fotoKegiatan->urutan;

        $fotoKegiatan->update($validated);

        return redirect()->route('cpanel.foto-kegiatan.index')
            ->with('success', NotificationService::success('updated', 'foto kegiatan'));
    }

    public function destroy(ActivityPhoto $fotoKegiatan): RedirectResponse
    {
        $this->fileUploadService->deleteImage($fotoKegiatan->gambar);
        $fotoKegiatan->delete();

        return redirect()->route('cpanel.foto-kegiatan.index')
            ->with('success', NotificationService::success('deleted', 'foto kegiatan'));
    }
}
