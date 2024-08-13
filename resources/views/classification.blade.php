@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Selamat Datang di Halaman Klasifikasi C4.5</h1>
                <p>Halaman ini berisi proses klasifikasi menggunakan Algoritma C4.5</p>

                <hr>

                <h2>Dataset Klasifikasi</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nilai Matematika</th>
                            <th>Nilai IPA</th>
                            <th>Nilai Bahasa Inggris</th>
                            <th>Nilai Bahasa Indonesia</th>
                            <th>Hasil Klasifikasi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($classifications->isEmpty())
                            <tr>
                                <td colspan="6">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach ($classifications as $classification)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $classification->student->nama_siswa }}</td> <!-- Akses relasi student -->
                                    <td>{{ $classification->student->nilai_mtk }}</td>
                                    <td>{{ $classification->student->nilai_ipa }}</td>
                                    <td>{{ $classification->student->nilai_bhs_inggris }}</td>
                                    <td>{{ $classification->student->nilai_bhs_indo }}</td>
                                    <td>{{ $classification->result }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <h2>Hasil Klasifikasi</h2>
                <p>
                    <b>Pohon Keputusan:</b>
                    <br>
                    <pre>{{ $stringTree }}</pre>
                </p>

                {{-- <p>
                    <b>Hasil klasifikasi untuk data baru adalah:</b>
                    <br>
                    <strong>{{ $classification }}</strong>
                </p> --}}

            </div>
        </div>
    </div>
@endsection
