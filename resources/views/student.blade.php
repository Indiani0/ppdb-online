@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Selamat Datang di halaman Peserta Didik</h1>
                <p>Halaman ini berisi data calon siswa yang telah melakukan pendaftaran PPDB</p>

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

                                <td><a href="#" class="btn btn-warning"
                                        onclick="return confirm('Apakah Anda yakin ingin mengubah data user ini?');">Edit</a>
                                </td>
                                <td>
                                    <form action="#" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data user ini?');">
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
