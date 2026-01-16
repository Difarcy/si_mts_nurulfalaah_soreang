<?php

namespace App\Core\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    /**
     * Upload single image file
     *
     * @param  int  $maxSize  Maximum size in KB (default: 5120 = 5MB)
     * @param  array  $allowedMimes  Allowed MIME types
     * @return string|null Path to uploaded file or null if no file
     *
     * @throws \Exception
     */
    public function uploadImage(
        ?UploadedFile $file,
        string $folder,
        int $maxSize = 5120,
        array $allowedMimes = ['jpeg', 'jpg', 'png', 'webp', 'gif', 'svg']
    ): ?string {
        if (! $file) {
            return null;
        }

        if (! $file->isValid()) {
            throw new \Exception('File tidak valid: ' . $file->getErrorMessage());
        }

        $maxSizeBytes = $maxSize * 1024;
        if ($file->getSize() > $maxSizeBytes) {
            throw new \Exception("Ukuran file terlalu besar. Maksimal: {$maxSize}KB");
        }

        $mimeType = $file->getMimeType();
        $extension = strtolower($file->getClientOriginalExtension());
        $allowedMimeTypes = array_map(fn ($ext) => "image/{$ext}", $allowedMimes);

        // Add alternative MIME types (e.g., image/x-png for PNG files)
        $allowedMimeTypes = array_merge(
            $allowedMimeTypes,
            ['image/x-png', 'image/x-jpeg', 'image/x-webp']
        );

        // Check both MIME type AND file extension for better compatibility
        $isMimeValid = in_array($mimeType, $allowedMimeTypes, true);
        $isExtensionValid = in_array($extension, $allowedMimes, true);

        if (! ($isMimeValid || $isExtensionValid)) {
            throw new \Exception('Format file tidak didukung. Format yang diizinkan: ' . implode(', ', $allowedMimes));
        }

        try {
            $path = $file->store($folder, 'public');
            Log::info('File uploaded successfully', ['path' => $path, 'folder' => $folder]);

            return $path;
        } catch (\Exception $e) {
            Log::error('File upload failed', [
                'error' => $e->getMessage(),
                'folder' => $folder,
                'file_name' => $file->getClientOriginalName(),
            ]);
            throw new \Exception('Gagal mengupload file: ' . $e->getMessage());
        }
    }

    /**
     * Upload multiple image files
     *
     * @param  array  $files  Array of UploadedFile
     * @param  int  $maxSize  Maximum size in KB
     * @param  array  $allowedMimes  Allowed MIME types
     * @return array Array of uploaded file paths
     *
     * @throws \Exception
     */
    public function uploadImages(
        array $files,
        string $folder,
        int $maxSize = 5120,
        array $allowedMimes = ['jpeg', 'jpg', 'png', 'webp', 'gif']
    ): array {
        $uploadedPaths = [];

        foreach ($files as $file) {
            if ($file && $file->isValid()) {
                try {
                    $path = $this->uploadImage($file, $folder, $maxSize, $allowedMimes);
                    if ($path) {
                        $uploadedPaths[] = $path;
                    }
                } catch (\Exception $e) {
                    Log::warning('Failed to upload one of multiple files', [
                        'error' => $e->getMessage(),
                        'file_name' => $file->getClientOriginalName(),
                    ]);
                }
            }
        }

        return $uploadedPaths;
    }

    public function deleteImage(?string $path): bool
    {
        if (! $path) {
            return false;
        }

        try {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
                Log::info('File deleted successfully', ['path' => $path]);

                return true;
            }

            return false;
        } catch (\Exception $e) {
            Log::error('File deletion failed', [
                'error' => $e->getMessage(),
                'path' => $path,
            ]);

            return false;
        }
    }

    public function deleteImages(array $paths): int
    {
        $deletedCount = 0;

        foreach ($paths as $path) {
            if ($this->deleteImage($path)) {
                $deletedCount++;
            }
        }

        return $deletedCount;
    }

    /**
     * Validate image file
     *
     * @param  int  $maxSize  Maximum size in KB
     * @param  array  $allowedMimes  Allowed MIME types
     * @return array ['valid' => bool, 'message' => string]
     */
    public function validateImage(
        ?UploadedFile $file,
        int $maxSize = 5120,
        array $allowedMimes = ['jpeg', 'jpg', 'png', 'webp', 'gif', 'svg']
    ): array {
        if (! $file) {
            return ['valid' => false, 'message' => 'File tidak ditemukan.'];
        }

        if (! $file->isValid()) {
            return ['valid' => false, 'message' => 'File tidak valid.'];
        }

        $maxSizeBytes = $maxSize * 1024;
        if ($file->getSize() > $maxSizeBytes) {
            $fileSizeMB = round($file->getSize() / (1024 * 1024), 2);

            return [
                'valid' => false,
                'message' => "Ukuran file terlalu besar! File Anda: {$fileSizeMB}MB. Maksimal: {$maxSize}KB.",
            ];
        }

        $mimeType = $file->getMimeType();
        $allowedMimeTypes = array_map(fn ($ext) => "image/{$ext}", $allowedMimes);

        if (! in_array($mimeType, $allowedMimeTypes, true)) {
            return [
                'valid' => false,
                'message' => 'Format file tidak didukung. Format yang diizinkan: ' . implode(', ', $allowedMimes),
            ];
        }

        return ['valid' => true, 'message' => 'File valid.'];
    }
}

