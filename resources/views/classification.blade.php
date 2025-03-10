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
                            <th>Jenis <br> Kelamin</th>
                            <th>Nilai Test <br>Minat Bakat</th>
                            <th>Nilai Test <br>Psikotes</th>
                            <th>Nilai Test <br>Numerik</th>
                            <th>Minat Jurusan</th>
                            <th>Hasil Klasifikasi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($students->isEmpty())
                            <tr>
                                <td colspan="5"><b style="color: red">Tidak ada data untuk diklasifikasikan!</b></td>
                            </tr>
                        @else
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->nama_siswa ?? 'Data tidak ditemukan' }}</td>
                                    <td>{{ $student->jenis_kelamin }}</td>
                                    <td>{{ $student->test_minat_bakat }}</td>
                                    <td>{{ $student->test_psikotes }}</td>
                                    <td>{{ $student->test_numerik }}</td>
                                    <td>{{ $student->minat_jurusan }}</td>
                                    <td>{{ $student->result }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <br>
                <h2>Proses Klasifikasi</h2>
                <p>Silahkan masukkan data yang akan digunakan untuk melihat hasil dari proses klasifikasi</p>

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

                {{-- <p>
                    <b>Pohon Keputusan:</b>
                    <br>
                    <pre>{{ $stringTree }}</pre>
                </p> --}}

                @foreach ($classifications as $classification)
                    <h4><b>Pohon Keputusan untuk {{ $classification->student->nama_siswa }}</h4><b>
                        <pre>
                                @php
                                    // Mengambil data siswa
                                    $student = $classification->student;

                                    // Menyiapkan payload untuk klasifikasi ulang
                                    $payload = [
                                        'test_minat_bakat' => $student->test_minat_bakat,
                                        'test_psikotes' => $student->test_psikotes,
                                        'test_numerik' => $student->test_numerik,
                                        'minat_jurusan' => $student->minat_jurusan,
                                    ];

                                    // Melakukan klasifikasi ulang untuk siswa ini
                                    $classificationResult = app(
                                        \App\Http\Controllers\ClassificationController::class,
                                    )->getClassification($student, false);

                                    echo '<br>';
                                    echo $stringTree;
                                @endphp
                            </pre>

                        <table>
                            <tr>
                                <td>Nilai Entropy Total : 0,970064152</td>
                            </tr>
                            <tr>
                                <td>Nilai Gain Tes Minat Bakat = 0,516054161</td>
                            </tr>
                            <tr>
                                <td>Nilai Gain Tes Psikotes = 0,426514729</td>
                            </tr>
                            <tr>
                                <td>Nilai Gain Tes Numerik = 0,54157362</td>
                            </tr>
                            <tr>
                                <td>Nilai Gain Minat Jurusan = 0,390806677</td>
                            </tr>
                        </table><br>
                        <p
                            style="padding: 10px; background-color: #28a745; color: white; border-radius: 5px; text-align:center; font-weight: bold;">
                            Hasil Klasifikasi : {{ $classification->result }}
                        </p>
                @endforeach

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
