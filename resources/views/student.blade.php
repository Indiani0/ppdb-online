@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Selamat Datang di halaman Peserta Didik</h1>
                <p>Halaman ini berisi data calon siswa yang telah melakukan pendaftaran PPDB</p>

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

                <div class="mb-3">
                    <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Data Calon Siswa</a>
                    <a href="{{ route('students.pdf') }}" class="btn btn-secondary">Cetak Laporan PDF</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Sekolah</th>
                            <th>Alamat</th>
                            <th>Minat Jurusan</th>
                            <th>Foto Siswa</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($students as $index => $student)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $student->nik }}</td>
                                <td>{{ $student->nisn }}</td>
                                <td>{{ $student->nama_siswa }}</td>
                                <td>{{ $student->jenis_kelamin }}</td>
                                <td>{{ $student->nama_asal_sekolah }}</td>
                                <td>{{ $student->alamat_siswa }}</td>
                                <td>{{ $student->minat_jurusan }}</td>
                                <td>
                                    @if ($student->foto_siswa)
                                        <img src="{{ asset('storage/' . $student->foto_siswa) }}"
                                            alt="Foto {{ $student->nama_siswa }}" style="width: 80px; height: auto;">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>

                                <td><a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning"
                                        onclick="return confirm('Apakah Anda yakin ingin mengubah data siswa ini?');">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
