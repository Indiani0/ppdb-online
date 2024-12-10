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
                <p>Silahkan masukkan data yang akan digunakan untuk melihat hasil dari proses klasifikasi</p>
                {{-- <p>
                    <b>Pohon Keputusan:</b>
                    <br>
                    <pre>{{ $stringTree }}</pre>
                </p> --}}

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

                <form action="{{ route('classifications.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nama_siswa">Nama Lengkap</label>
                        <select id="nama_siswa" name="nama_siswa" class="form-control" required>
                            <option value="" disabled selected>Pilih Nama Siswa</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->nama_siswa }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="test_minat_bakat">Nilai Test Minat Bakat</label>
                        <select id="test_minat_bakat" name="test_minat_bakat" class="form-control" required>
                            <option value="" disabled selected></option>
                            <option value="kompeten" {{ old('test_minat_bakat') == 'kompeten' ? 'selected' : '' }}>Kompeten
                            </option>
                            <option value="cukup kompeten"
                                {{ old('test_minat_bakat') == 'cukup kompeten' ? 'selected' : '' }}>Cukup Kompeten
                            </option>
                            <option value="belum kompeten"
                                {{ old('test_minat_bakat') == 'Belum Kompeten' ? 'selected' : '' }}>Belum Kompeten</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="test_psikotes">Nilai Test Psikotes</label>
                        <select id="test_psikotes" name="test_psikotes" class="form-control" required>
                            <option value="" disabled selected></option>
                            <option value="kompeten" {{ old('test_psikotes') == 'kompeten' ? 'selected' : '' }}>Kompeten
                            </option>
                            <option value="cukup kompeten"
                                {{ old('test_psikotes') == 'cukup kompeten' ? 'selected' : '' }}>
                                Cukup Kompeten
                            </option>
                            <option value="belum kompeten"
                                {{ old('test_psikotes') == 'Belum Kompeten' ? 'selected' : '' }}>
                                Belum Kompeten</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="test_numerik">Nilai Test Numerik</label>
                        <select id="test_numerik" name="test_numerik" class="form-control" required>
                            <option value="" disabled selected></option>
                            <option value="kompeten" {{ old('test_numerik') == 'kompeten' ? 'selected' : '' }}>Kompeten
                            </option>
                            <option value="cukup kompeten" {{ old('test_numerik') == 'cukup kompeten' ? 'selected' : '' }}>
                                Cukup Kompeten
                            </option>
                            <option value="belum kompeten" {{ old('test_numerik') == 'Belum Kompeten' ? 'selected' : '' }}>
                                Belum Kompeten</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="minat_jurusan">Minat Jurusan</label>
                        <input type="text" id="minat_jurusan" name="minat_jurusan" class="form-control" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Lakukan Klasifikasi C4.5</button>
                </form>

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

    <script>
        document.getElementById('nama_siswa').addEventListener('change', function() {
            let selectedStudent = @json($students);
            let student = selectedStudent.find(s => s.id == this.value);

            document.getElementById('jenis_kelamin').value = student.jenis_kelamin;
            document.getElementById('minat_jurusan').value = student.minat_jurusan;
        });
    </script>
@endsection
