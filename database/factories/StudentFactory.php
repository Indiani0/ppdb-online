<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Identitas Calon Siswa
            'nik' => fake()->numerify('################'),
            'nisn' => fake()->numerify('##########'),
            'nama_siswa' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'agama' => fake()->randomElement(['Islam', 'Katholik', 'Buddha', 'Hindu']),
            'alamat_siswa' => fake()->address(),
            'email' => fake()->email(),
            'telepon' => fake()->numerify('#############'),

            // Sekolah Asal
            'nama_asal_sekolah' => fake()->company(),
            'jenjang_sekolah' => fake()->randomElement(['SMP', 'MTs']),
            'tahun_lulus' => fake()->year(),
            'alamat_sekolah' => fake()->streetAddress(),

            // Identitas Orang Tua
            'nama_ayah' => fake()->name(),
            'pekerjaan_ayah' => fake()->jobTitle(),
            'alamat_ayah' => fake()->address(),

            'nama_ibu' => fake()->name(),
            'pekerjaan_ibu' => fake()->jobTitle(),
            'alamat_ibu' => fake()->address(),

            // Data Pendukung
            'nilai_mtk' => fake()->numberBetween(30, 100),
            'nilai_ipa' => fake()->numberBetween(30, 100),
            'nilai_bhs_inggris' => fake()->numberBetween(30, 100),
            'nilai_bhs_indo' => fake()->numberBetween(30, 100),
            'minat_jurusan' => fake()->randomElement(['Teknik Pembuatan Kain', 'Teknik Elektro Industri', 'Layanan Perbankan Syariah']),
            'foto_siswa' => fake()->imageUrl(640, 480, 'animals', true),

        ];
    }
}
