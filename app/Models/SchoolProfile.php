<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'gambar_sekolah',
        'deskripsi_sekolah',
        'sejarah',
        'visi',
        'misi',
        'tujuan',
        'struktur_organisasi',
        'kepala_sekolah_nama',
        'kepala_sekolah_foto',
        'kepala_sekolah_sambutan',
    ];
}
