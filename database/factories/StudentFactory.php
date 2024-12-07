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
            'nik' => fake()->numerify('320#############'),
            'nisn' => fake()->numerify('002#######'),
            'nama_siswa' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'agama' => fake()->randomElement(['Islam', 'Katholik', 'Buddha', 'Hindu']),
            'alamat_siswa' => fake()->address(),
            'email' => fake()->email(),
            'telepon' => fake()->numerify('08###########'),

            // Sekolah Asal
            'nama_asal_sekolah' => fake()->randomElement([
                'SMPN 1 Rancaekek',
                'SMP Bakti Ilham',
                'SMP BPI Rancaekek',
                'SMP Lugina',
                'SMP Pasundan Rancaekek',
                'SMP PGRI Haurpugur'
            ]),
            'jenjang_sekolah' => fake()->randomElement(['SMP']),
            'tahun_lulus' => fake()->randomElement(['2023']),
            'alamat_sekolah' => fake()->streetAddress(),

            // Identitas Orang Tua
            'nama_ayah' => fake()->name(),
            'pekerjaan_ayah' => fake()->jobTitle(),
            'alamat_ayah' => fake()->address(),

            'nama_ibu' => fake()->name(),
            'pekerjaan_ibu' => fake()->jobTitle(),
            'alamat_ibu' => fake()->address(),

            // Data Pendukung
            'minat_jurusan' => fake()->randomElement(['Teknik Pembuatan Kain', 'Teknik Elektro Industri', 'Layanan Perbankan Syariah']),
            'foto_siswa' => fake()->imageUrl(640, 480, 'animals', true),
        ];
    }
}
