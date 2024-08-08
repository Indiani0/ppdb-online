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
                            <td><label for="namalengkap">Nama Lengkap</label></td>
                            <td>: <input type="text" name="namalengkap" id="namalengkap" required></td>
                        </tr>

                        <tr>
                            <td><label for="jeniskelamin">Jenis Kelamin</label></td>
                            <td>:
                                <input type="radio" name="jeniskelamin" id="pria">
                                <label for="pria">Pria</label>

                                <input type="radio" name="jeniskelamin" id="wanita">
                                <label for="wanita">Wanita</label>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="tempatlahir">Tempat Lahir</label></td>
                            <td>: <input type="text" name="tempatlahir" id="tempatlahir" required></td>
                        </tr>

                        <tr>
                            <td><label for="tanggallahir">Tanggal Lahir</label></td>
                            <td>: <input type="date" name="tanggallahir" id="tanggallahir" required></td>
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
                            <td><label for="alamat">Alamat Rumah</label></td>
                            <td>:
                                <textarea name="alamat" id="alamat" cols="30" rows="4" required></textarea>
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
                            <td><label for="sekolah">Nama Sekolah / Madrasah</label></td>
                            <td>: <input type="text" name="sekolah" id="sekolah" required></td>
                        </tr>

                        <tr>
                            <td><label for="jenjang">Jenjang Sekolah</label></td>
                            <td>: <input type="text" name="jenjang" id="jenjang" placeholder="SMP/MTs/dll"
                                    required>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="tahunlulus">Tahun Lulus</label></td>
                            <td>: <input type="number" name="tahunlulus" id="tahunlulus" placeholder="2020"></td>
                        </tr>

                        <tr>
                            <td><label for="alamatsekolah">Alamat Sekolah</label></td>
                            <td>:
                                <textarea name="alamatsekolah" id="alamatsekolah" cols="30" rows="4" required></textarea>
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
                            <td><label for="ayah">Nama Lengkap</label></td>
                            <td>: <input type="text" id="ayah" name="ayah" required></td>
                        </tr>

                        <tr>
                            <td><label for="pekerjaanayah">Pekerjaan</label></td>
                            <td>: <input type="text" id="pekerjaanayah" name="pekerjaanayah" required></td>
                        </tr>

                        <tr>
                            <td><label for="alamatayah">Alamat</label></td>
                            <td>:
                                <textarea name="alamatayah" id="alamatayah" cols="30" rows="4" required></textarea>
                            </td>
                        </tr>

                        <tr>
                            <th>Ibu :</th>
                        </tr>

                        <tr>
                            <td><label for="ibu">Nama Lengkap</label></td>
                            <td>: <input type="text" id="ibu" name="ibu" required></td>
                        </tr>

                        <tr>
                            <td><label for="pekerjaanibu">Pekerjaan</label></td>
                            <td>: <input type="text" id="pekerjaanibu" name="pekerjaanibu" required></td>
                        </tr>

                        <tr>
                            <td><label for="alamatibu">Alamat</label></td>
                            <td>:
                                <textarea name="alamatibu" id="alamatibu" cols="30" rows="4" required></textarea>
                            </td>
                        </tr>

                        {{-- Dokumen Pendukung --}}
                        <tr>
                            <th><br>IV. UPLOAD DOKUMEN PENDUKUNG</th>
                        </tr>

                        <tr>
                            <td><label for="kartukeluarga">Kartu Keluarga</label></td>
                            <td>: <input type="file" name="kartukeluarga" id="kartukeluarga" required></td>
                        </tr>

                        <tr>
                            <td><label for="aktalahir">Akta Kelahiran</label></td>
                            <td>: <input type="file" name="aktalahir" id="aktalahir" required></td>
                        </tr>

                        <tr>
                            <td><label for="ktp">KTP Orang Tua / Wali</label></td>
                            <td>: <input type="file" name="ktp" id="ktp" required></td>
                        </tr>

                        <tr>
                            <td><label for="fotosiswa">Foto Siswa - Background Merah</label></td>
                            <td>: <input type="file" name="fotosiswa" id="fotosiswa" required></td>
                        </tr>

                        <tr>
                            <td><label for="suratlulus">Surat Keterangan Lulus / Ijazah / SKHUN</label></td>
                            <td>: <input type="file" name="suratlulus" id="suratlulus" required></td>
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
