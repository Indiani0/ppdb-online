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
                            <th>Nama Ibu</th>
                            <th>Nama Ayah</th>
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
                                <td>{{ $student->nama_ibu }}</td>
                                <td>{{ $student->nama_ayah }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
