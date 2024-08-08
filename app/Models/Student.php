<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        // Identitas Calon Siswa
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

        // Sekolah Asal
        'nama_asal_sekolah',
        'jenjang_sekolah',
        'tahun_lulus',
        'alamat_sekolah',

        // Identitas Orang Tua
        'nama_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',

        // Data Pendukung
        'nilai_mtk',
        'nilai_ipa',
        'nilai_bhs_inggris',
        'nilai_bhs_indo',
        'minat_jurusan',

        // Dokumen Pendukung
        'scan_kk',
        'scan_akta',
        'scan_ktp_wali',
        'foto_siswa',
        'scan_surat_lulus',
    ];
}
