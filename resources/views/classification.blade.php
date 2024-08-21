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
                            <th>Nilai <br>Matematika</th>
                            <th>Nilai <br>IPA</th>
                            <th>Nilai <br>Bhs. Inggris</th>
                            <th>Nilai <br>Bhs. Indonesia</th>
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
                                    <td>{{ $classification->student->nama_siswa }}</td>
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

                <br>
                <h2>Hasil Klasifikasi</h2>
                <p>
                    <b>Pohon Keputusan:</b>
                    <br>
                    <pre>{{ $stringTree }}</pre>
                </p>
            </div>
        </div>
    </div>
@endsection
