<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentAchievementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jenis_prestasi' => 'required|in:Akademik,Non-Akademik',
            'tingkat_prestasi' => 'required|in:Sekolah,Kecamatan,Kabupaten,Provinsi,Nasional,Internasional',
            'tanggal_prestasi' => 'required|date',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:5120',
            'foto_sertifikat' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul prestasi wajib diisi.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'nama_siswa.required' => 'Nama siswa wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'jenis_prestasi.required' => 'Jenis prestasi wajib dipilih.',
            'jenis_prestasi.in' => 'Jenis prestasi tidak valid.',
            'tingkat_prestasi.required' => 'Tingkat prestasi wajib dipilih.',
            'tingkat_prestasi.in' => 'Tingkat prestasi tidak valid.',
            'tanggal_prestasi.required' => 'Tanggal prestasi wajib diisi.',
            'tanggal_prestasi.date' => 'Format tanggal prestasi tidak valid.',
            'gambar.required' => 'Foto siswa/dokumentasi wajib diupload.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan: jpeg, jpg, png, webp, gif.',
            'gambar.max' => 'Ukuran gambar maksimal 5MB.',
            'foto_sertifikat.image' => 'File sertifikat harus berupa gambar.',
            'foto_sertifikat.mimes' => 'Format gambar yang diizinkan: jpeg, jpg, png, webp, gif.',
            'foto_sertifikat.max' => 'Ukuran gambar maksimal 5MB.',
        ];
    }
}
