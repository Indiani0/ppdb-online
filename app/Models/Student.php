<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat_siswa',
        'email',
        'telepon',
        'nama_asal_sekolah',
        'jenjang_sekolah',
        'tahun_lulus',
        'alamat_sekolah',
        'nama_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',
    ];
}
