<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form PPDB</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/form_style.css">
</head>

<body>
    <x-layout>
        <div class="daftar box-content">
            <div class="header-daftar card-content">
                <h1>Daftar PPDB</h1>
                <p>
                    Selamat Datang di Aplikasi PPDB SMK Piramida, Silahkan isi formulir dibawah untuk melakukan
                    pendaftaran!
                </p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="form-ppdb card-content">
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table>
                        {{-- Form Identitas Diri --}}
                        <tr>
                            <th>I. IDENTITAS PESERTA DIDIK</th>
                        </tr>

                        <tr>
                            <td><label for="nik">NIK</label></td>
                            <td>: <input type="number" name="nik" id="nik" required></td>
                        </tr>

                        <tr>
                            <td><label for="nisn">NISN</label></td>
                            <td>: <input type="number" name="nisn" id="nisn" required></td>
                        </tr>

                        <tr>
                            <td><label for="nama_siswa">Nama Lengkap</label></td>
                            <td>: <input type="text" name="nama_siswa" id="nama_siswa" required></td>
                        </tr>

                        <tr>
                            <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                            <td>:
                                <select name="jenis_kelamin" id="jenis_kelamin">
                                    <option>Prempuan</option>
                                    <option>Laki-Laki</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="tempat_lahir">Tempat Lahir</label></td>
                            <td>: <input type="text" name="tempat_lahir" id="tempat_lahir" required></td>
                        </tr>

                        <tr>
                            <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
                            <td>: <input type="date" name="tanggal_lahir" id="tanggal_lahir" required></td>
                        </tr>

                        <tr>
                            <td><label for="agama">Agama</label></td>
                            <td>:
                                <select name="agama" id="agama">
                                    <option>Islam</option>
                                    <option>Katholik</option>
                                    <option>Buddha</option>
                                    <option>Hindu</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="alamat_siswa">Alamat Rumah</label></td>
                            <td>:
                                <textarea name="alamat_siswa" id="alamat_siswa" cols="30" rows="4" required></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="email">Email</label></td>
                            <td>: <input type="email" name="email" id="email" required></td>
                        </tr>

                        <tr>
                            <td><label for="telepon">Nomor Telepon</label></td>
                            <td>: <input type="tel" name="telepon" id="telepon" placeholder="08123456789"
                                    required>
                            </td>
                        </tr>


                        {{-- Form Sekolah asal --}}
                        <tr>
                            <th><br>II. SEKOLAH ASAL</th>
                        </tr>

                        <tr>
                            <td><label for="nama_asal_sekolah">Nama Sekolah / Madrasah</label></td>
                            <td>: <input type="text" name="nama_asal_sekolah" id="nama_asal_sekolah" required></td>
                        </tr>

                        <tr>
                            <td><label for="jenjang_sekolah">Jenjang Sekolah</label></td>
                            <td>: <input type="text" name="jenjang_sekolah" id="jenjang_sekolah"
                                    placeholder="SMP/MTs/dll" required>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="tahun_lulus">Tahun Lulus</label></td>
                            <td>: <input type="number" name="tahun_lulus" id="tahun_lulus" placeholder="2020"></td>
                        </tr>

                        <tr>
                            <td><label for="alamat_sekolah">Alamat Sekolah</label></td>
                            <td>:
                                <textarea name="alamat_sekolah" id="alamat_sekolah" cols="30" rows="4" required></textarea>
                            </td>
                        </tr>


                        {{-- Identitas Orang Tua / Wali --}}
                        <tr>
                            <th><br>III. IDENTITAS ORANG TUA / WALI</th>
                        </tr>

                        <tr>
                            <th>Ayah :</th>
                        </tr>

                        <tr>
                            <td><label for="nama_ayah">Nama Lengkap</label></td>
                            <td>: <input type="text" id="nama_ayah" name="nama_ayah" required></td>
                        </tr>

                        <tr>
                            <td><label for="pekerjaan_ayah">Pekerjaan</label></td>
                            <td>: <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" required></td>
                        </tr>

                        <tr>
                            <td><label for="alamat_ayah">Alamat</label></td>
                            <td>:
                                <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="4" required></textarea>
                            </td>
                        </tr>

                        <tr>
                            <th>Ibu :</th>
                        </tr>

                        <tr>
                            <td><label for="nama_ibu">Nama Lengkap</label></td>
                            <td>: <input type="text" id="nama_ibu" name="nama_ibu" required></td>
                        </tr>

                        <tr>
                            <td><label for="pekerjaan_ibu">Pekerjaan</label></td>
                            <td>: <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" required></td>
                        </tr>

                        <tr>
                            <td><label for="alamat_ibu">Alamat</label></td>
                            <td>:
                                <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="4" required></textarea>
                            </td>
                        </tr>


                        {{-- Data Pendukung --}}
                        <tr>
                            <th><br>IV. DATA PENDUKUNG</th>
                        </tr>

                        <tr>
                            <td><label for="nilai_mtk">Nilai Matematika</label></td>
                            <td>: <input type="float" id="nilai_mtk" name="nilai_mtk" required></td>
                        </tr>

                        <tr>
                            <td><label for="nilai_ipa">Nilai IPA</label></td>
                            <td>: <input type="float" id="nilai_ipa" name="nilai_ipa" required></td>
                        </tr>

                        <tr>
                            <td><label for="nilai_bhs_inggris">Nilai Bahasa Inggris</label></td>
                            <td>: <input type="float" id="nilai_bhs_inggris" name="nilai_bhs_inggris" required>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="nilai_bhs_indo">Nilai Bahasa Indonesia</label></td>
                            <td>: <input type="float" id="nilai_bhs_indo" name="nilai_bhs_indo" required>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="minat_jurusan">Minat Jurusan</label></td>
                            <td>:
                                <select name="minat_jurusan" id="minat_jurusan">
                                    <option>Teknik Pembuatan Kain</option>
                                    <option>Teknik Elektro Industri</option>
                                    <option>Layanan Perbankan Syariah</option>
                                </select>
                            </td>
                        </tr>


                        {{-- Dokumen Pendukung --}}
                        <tr>
                            <th><br>V. UPLOAD DOKUMEN PENDUKUNG</th>
                        </tr>

                        <tr>
                            <td><label for="scan_kk">Kartu Keluarga</label></td>
                            <td>: <input type="file" name="scan_kk" id="scan_kk" required></td>
                        </tr>

                        <tr>
                            <td><label for="scan_akta">Akta Kelahiran</label></td>
                            <td>: <input type="file" name="scan_akta" id="scan_akta" required></td>
                        </tr>

                        <tr>
                            <td><label for="scan_ktp_wali">KTP Orang Tua / Wali</label></td>
                            <td>: <input type="file" name="scan_ktp_wali" id="scan_ktp_wali" required></td>
                        </tr>

                        <tr>
                            <td><label for="foto_siswa">Foto Siswa - Background Merah</label></td>
                            <td>: <input type="file" name="foto_siswa" id="foto_siswa" required></td>
                        </tr>

                        <tr>
                            <td><label for="scan_surat_lulus">Surat Keterangan Lulus / Ijazah / SKHUN</label></td>
                            <td>: <input type="file" name="scan_surat_lulus" id="scan_surat_lulus" required></td>
                        </tr>


                        {{-- Submit Form --}}
                        <tr>
                            <td><br>
                                <button type="submit" name="submit">Kirim</button>
                                <input type="reset" name="reset" value="Reset Formulir">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </x-layout>
</body>

</html>
