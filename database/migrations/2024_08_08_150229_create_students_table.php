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
            $table->id();
            $table->string('nik');
            $table->string('nisn');
            $table->string('namalengkap');
            $table->string('jeniskelamin');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('agama');
            $table->text('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->string('sekolah');
            $table->string('jenjang');
            $table->year('tahunlulus');
            $table->text('alamatsekolah');
            $table->string('ayah');
            $table->string('pekerjaanayah');
            $table->text('alamatayah');
            $table->string('ibu');
            $table->string('pekerjaanibu');
            $table->text('alamatibu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
