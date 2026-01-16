<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnouncementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'urutan' => 'nullable|integer|min:0',
            'status' => 'required|in:publish,draft,nonaktif',
            'author_name' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'isi.required' => 'Isi pengumuman wajib diisi.',
            'urutan.integer' => 'Urutan harus berupa angka.',
            'urutan.min' => 'Urutan minimal 0.',
            'author_name.required' => 'Nama penulis wajib diisi.',
            'author_name.max' => 'Nama penulis maksimal 100 karakter.',
        ];
    }
}
