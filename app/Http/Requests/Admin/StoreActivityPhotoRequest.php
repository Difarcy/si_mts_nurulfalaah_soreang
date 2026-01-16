<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityPhotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:5120',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'judul.max' => 'Judul maksimal 255 karakter.',
            'gambar.array' => 'Gambar harus berupa array.',
            'gambar.*.image' => 'File harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar yang diizinkan: jpeg, jpg, png, webp, gif.',
            'gambar.*.max' => 'Ukuran gambar maksimal 5MB.',
            'urutan.integer' => 'Urutan harus berupa angka.',
            'urutan.min' => 'Urutan minimal 0.',
        ];
    }
}
