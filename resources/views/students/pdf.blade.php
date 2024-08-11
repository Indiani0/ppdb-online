<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Laporan Data Siswa</h2>
    <table>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
