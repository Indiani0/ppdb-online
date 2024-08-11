@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Tambah Data User</h1>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <br>

                    {{-- Form Identitas Diri --}}
                    <p>I. IDENTITAS PESERTA DIDIK</p>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="{{ old('nik') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="number" class="form-control" id="nisn" name="nisn" value="{{ old('nisn') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                            value="{{ old('nama_siswa') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>L</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>P</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ old('tempat_lahir') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-control" id="agama" name="agama" required>
                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Katholik" {{ old('agama') == 'Katholik' ? 'selected' : '' }}>Katholik
                            </option>
                            <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_siswa" class="form-label">Alamat Rumah</label>
                        <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa"
                            value="{{ old('alamat_siswa') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="telepon" name="telepon"
                            value="{{ old('telepon') }}" required>
                    </div>

                    <br>

                    {{-- Form Sekolah asal --}}
                    <p>II. SEKOLAH ASAL</p>
                    <div class="mb-3">
                        <label for="nama_asal_sekolah" class="form-label">Nama Sekolah / Madrasah</label>
                        <input type="text" class="form-control" id="nama_asal_sekolah" name="nama_asal_sekolah"
                            value="{{ old('nama_asal_sekolah') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenjang_sekolah" class="form-label">Jenjang Sekolah</label>
                        <input type="text" class="form-control" id="jenjang_sekolah" name="jenjang_sekolah"
                            value="{{ old('jenjang_sekolah') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus"
                            value="{{ old('tahun_lulus') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                        <input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah"
                            value="{{ old('alamat_sekolah') }}" required>
                    </div>

                    <br>

                    {{-- Identitas Orang Tua / Wali --}}
                    <p>III. IDENTITAS ORANG TUA / WALI</p>
                    <p>Ayah :</p>
                    <div class="mb-3">
                        <label for="nama_ayah" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                            value="{{ old('nama_ayah') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                            value="{{ old('pekerjaan_ayah') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_ayah" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat_ayah" name="alamat_ayah"
                            value="{{ old('alamat_ayah') }}" required>
                    </div>

                    <p>Ibu :</p>
                    <div class="mb-3">
                        <label for="nama_ibu" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                            value="{{ old('nama_ibu') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                            value="{{ old('pekerjaan_ibu') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_ibu" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat_ibu" name="alamat_ibu"
                            value="{{ old('alamat_ibu') }}" required>
                    </div>

                    <br>

                    {{-- Data Pendukung --}}
                    <p>IV. DATA PENDUKUNG</p>
                    <div class="mb-3">
                        <label for="nilai_mtk" class="form-label">Nilai Matematika</label>
                        <input type="float" class="form-control" id="nilai_mtk" name="nilai_mtk"
                            value="{{ old('nilai_mtk') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nilai_ipa" class="form-label">Nilai IPA</label>
                        <input type="float" class="form-control" id="nilai_ipa" name="nilai_ipa"
                            value="{{ old('nilai_ipa') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nilai_bhs_inggris" class="form-label">Nilai Bahasa Inggris</label>
                        <input type="float" class="form-control" id="nilai_bhs_inggris" name="nilai_bhs_inggris"
                            value="{{ old('nilai_bhs_inggris') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nilai_bhs_indo" class="form-label">Nilai Bahasa Indonesia</label>
                        <input type="float" class="form-control" id="nilai_bhs_indo" name="nilai_bhs_indo"
                            value="{{ old('nilai_bhs_indo') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="minat_jurusan" class="form-label">Minat Jurusan</label>
                        <select class="form-control" id="minat_jurusan" name="minat_jurusan" required>
                            <option value="Teknik Pembuatan Kain"
                                {{ old('minat_jurusan') == 'Teknik Pembuatan Kain' ? 'selected' : '' }}>Teknik Pembuatan
                                Kain</option>
                            <option value="Teknik Elektro Industri"
                                {{ old('minat_jurusan') == 'Teknik Elektro Industri' ? 'selected' : '' }}>Teknik Elektro
                                Industri
                            </option>
                            <option value="Layanan Perbankan Syariah"
                                {{ old('minat_jurusan') == 'Layanan Perbankan Syariah' ? 'selected' : '' }}>Layanan
                                Perbankan Syariah</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="foto_siswa" class="form-label">Foto Siswa</label>
                        <input type="file" class="form-control" id="foto_siswa" name="foto_siswa" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
