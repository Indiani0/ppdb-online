@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Mengubah Data Calon Siswa</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <br>

                    {{-- Form Identitas Diri --}}
                    <p>I. IDENTITAS PESERTA DIDIK</p>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="{{ $student->nik }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="number" class="form-control" id="nisn" name="nisn"
                            value="{{ $student->nisn }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_siswa">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                            value="{{ $student->nama_siswa }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L" {{ $student->jenis_kelamin == 'L' ? 'selected' : '' }}>L</option>
                            <option value="P" {{ $student->jenis_kelamin == 'P' ? 'selected' : '' }}>P</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ $student->tempat_lahir }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ $student->tanggal_lahir }}" required>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" id="agama" name="agama" required>
                            <option value="Islam" {{ $student->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Katholik" {{ $student->agama == 'Katholik' ? 'selected' : '' }}>Katholik
                            </option>
                            <option value="Buddha" {{ $student->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Hindu" {{ $student->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat_siswa">Alamat Rumah</label>
                        <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa"
                            value="{{ $student->alamat_siswa }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $student->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="telepon" name="telepon"
                            value="{{ $student->telepon }}" required>
                    </div>

                    <br>

                    {{-- Form Sekolah asal --}}
                    <p>II. SEKOLAH ASAL</p>
                    <div class="form-group">
                        <label for="nama_asal_sekolah">Nama Sekolah / Madrasah</label>
                        <input type="text" class="form-control" id="nama_asal_sekolah" name="nama_asal_sekolah"
                            value="{{ $student->nama_asal_sekolah }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jenjang_sekolah">Jenjang Sekolah</label>
                        <input type="text" class="form-control" id="jenjang_sekolah" name="jenjang_sekolah"
                            value="{{ $student->jenjang_sekolah }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus"
                            value="{{ $student->tahun_lulus }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat_sekolah">Alamat Sekolah</label>
                        <input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah"
                            value="{{ $student->alamat_sekolah }}" required>
                    </div>

                    <br>

                    {{-- Identitas Orang Tua / Wali --}}
                    <p>III. IDENTITAS ORANG TUA / WALI</p>
                    <p>Ayah :</p>
                    <div class="form-group">
                        <label for="nama_ayah">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                            value="{{ $student->nama_ayah }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan_ayah">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                            value="{{ $student->pekerjaan_ayah }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat_ayah">Alamat</label>
                        <input type="text" class="form-control" id="alamat_ayah" name="alamat_ayah"
                            value="{{ $student->alamat_ayah }}" required>
                    </div>

                    <p>Ibu :</p>
                    <div class="form-group">
                        <label for="nama_ibu">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                            value="{{ $student->nama_ibu }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                            value="{{ $student->pekerjaan_ibu }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat_ibu">Alamat</label>
                        <input type="text" class="form-control" id="alamat_ibu" name="alamat_ibu"
                            value="{{ $student->alamat_ibu }}" required>
                    </div>

                    <br>

                    {{-- Data Pendukung --}}
                    <p>IV. DATA PENDUKUNG</p>
                    <div class="form-group">
                        <label for="minat_jurusan">Minat Jurusan</label>
                        <select class="form-control" id="minat_jurusan" name="minat_jurusan" required>
                            <option value="Teknik Pembuatan Kain"
                                {{ $student->minat_jurusan == 'Teknik Pembuatan Kain' ? 'selected' : '' }}>Teknik Pembuatan
                                Kain</option>
                            <option value="Teknik Elektro Industri"
                                {{ $student->minat_jurusan == 'Teknik Elektro Industri' ? 'selected' : '' }}>Teknik Elektro
                                Industri
                            </option>
                            <option value="Layanan Perbankan Syariah"
                                {{ $student->minat_jurusan == 'Layanan Perbankan Syariah' ? 'selected' : '' }}>Layanan
                                Perbankan Syariah</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto_siswa">Foto Siswa</label>
                        <input type="file" class="form-control" id="foto_siswa" name="foto_siswa">
                        <small class="form-text text-muted">Tidak perlu diisi jika foto masih sama dengan data
                            sebelumnya.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
