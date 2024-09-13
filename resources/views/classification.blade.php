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
                            <th>Tingkat Kelolosan (%)</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($classifications->isEmpty())
                            <tr>
                                <td colspan="6"><b style="color: red">Tidak ada data untuk diklasifikasikan!</b></td>
                            </tr>
                        @else
                            @foreach ($classifications as $classification)
                                @php
                                    // Menghitung tingkat kelolosan
                                    $totalSubjects = 4;
                                    $passedSubjects = 0;

                                    if ($classification->student->nilai_mtk >= 70) {
                                        $passedSubjects++;
                                    }
                                    if ($classification->student->nilai_ipa >= 75) {
                                        $passedSubjects++;
                                    }
                                    if ($classification->student->nilai_bhs_inggris >= 85) {
                                        $passedSubjects++;
                                    }
                                    if ($classification->student->nilai_bhs_indo >= 97) {
                                        $passedSubjects++;
                                    }

                                    $passingPercentage = ($passedSubjects / $totalSubjects) * 100;
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $classification->student->nama_siswa }}</td>
                                    <td>{{ $classification->student->nilai_mtk }}</td>
                                    <td>{{ $classification->student->nilai_ipa }}</td>
                                    <td>{{ $classification->student->nilai_bhs_inggris }}</td>
                                    <td>{{ $classification->student->nilai_bhs_indo }}</td>
                                    <td>{{ $classification->result }}</td>
                                    <td>{{ number_format($passingPercentage, 2) }}%</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <br>
                <h2>Proses Klasifikasi</h2>
                {{-- <p>
                    <b>Pohon Keputusan:</b>
                    <br>
                    <pre>{{ $stringTree }}</pre>
                </p> --}}

                @if ($classifications->isEmpty())
                    <b style="color: red">Tidak ada data untuk proses klasifikasi!</b>
                @else
                    @foreach ($classifications as $classification)
                        <h4><b>Pohon Keputusan untuk {{ $classification->student->nama_siswa }}</h4><b>
                            <pre>
                                @php
                                    // Mengambil data siswa
                                    $student = $classification->student;

                                    // Menyiapkan payload untuk klasifikasi ulang
                                    $payload = [
                                        'nilai_mtk' => $student->nilai_mtk,
                                        'nilai_ipa' => $student->nilai_ipa,
                                        'nilai_bhs_inggris' => $student->nilai_bhs_inggris,
                                        'nilai_bhs_indo' => $student->nilai_bhs_indo,
                                    ];

                                    // Melakukan klasifikasi ulang untuk siswa ini
                                    $classificationResult = app(
                                        \App\Http\Controllers\ClassificationController::class,
                                    )->getClassification($student, false);

                                    echo '<br>';
                                    echo $stringTree;
                                @endphp
                            </pre>
                            <p
                                style="padding: 10px; background-color: #28a745; color: white; border-radius: 5px; text-align:center; font-weight: bold;">
                                Hasil Klasifikasi : {{ $classification->result }}
                            </p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
