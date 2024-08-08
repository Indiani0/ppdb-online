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
        'namalengkap',
        'jeniskelamin',
        'tempatlahir',
        'tanggallahir',
        'agama',
        'alamat',
        'email',
        'telepon',
        'sekolah',
        'jenjang',
        'tahunlulus',
        'alamatsekolah',
        'ayah',
        'pekerjaanayah',
        'alamatayah',
        'ibu',
        'pekerjaanibu',
        'alamatibu',
    ];
}
