<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            // Identitas Calon Siswa
            $table->id();
            $table->string('nik');
            $table->string('nisn');
            $table->string('nama_siswa');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->text('alamat_siswa');
            $table->string('email');
            $table->string('telepon');

            // Sekolah Asal
            $table->string('nama_asal_sekolah');
            $table->string('jenjang_sekolah');
            $table->year('tahun_lulus');
            $table->text('alamat_sekolah');

            // Identitas Orang Tua
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->text('alamat_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->text('alamat_ibu');

            // Data Pendukung
            $table->float('nilai_mtk');
            $table->float('nilai_ipa');
            $table->float('nilai_bhs_inggris');
            $table->float('nilai_bhs_indo');
            $table->string('minat_jurusan');

            // Dokumen Pendukung
            $table->string('kartu_keluarga')->nullable();
            $table->string('akta_lahir')->nullable();
            $table->string('ktp')->nullable();
            $table->string('foto_siswa')->nullable();
            $table->string('surat_lulus')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
