<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    /**
     * Handle image upload from editor (Summernote)
     */
    public function store(Request $request)
    {
        // Accept file under 'upload' (Summernote default) or 'file'
        $file = $request->file('upload') ?? $request->file('file');

        if (! $file || ! $file->isValid()) {
            return response()->json(['error' => 'No valid file uploaded'], 400);
        }

        // Basic validation
        if (! in_array($file->getClientMimeType(), ['image/jpeg', 'image/png', 'image/webp', 'image/gif'])) {
            return response()->json(['error' => 'Unsupported image type'], 415);
        }

        // Limit file size (5MB)
        if ($file->getSize() > 5 * 1024 * 1024) {
            return response()->json(['error' => 'File too large'], 413);
        }

        $filename = Str::random(16).'_'.time().'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('uploads/editor', $filename, 'public');

        if (! $path) {
            return response()->json(['error' => 'Failed to store file'], 500);
        }

        // Return URL expected by Summernote
        $url = asset('storage/'.$path);

        return response()->json(['url' => $url]);
    }
}
