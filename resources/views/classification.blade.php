@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Selamat Datang di Halaman Klasifikasi C4.5</h1>
                <p>Halaman ini berisi proses klasifikasi menggunakan Algotitma C4.5</p>

                @if (!empty($tree))
                    <h1>Pohon Keputusan</h1>
                    <pre>{{ var_dump($tree, true) }}</pre>
                @else
                    <p>Tidak ada pohon keputusan yang dihasilkan.</p>
                @endif

            </div>
        </div>
    </div>
@endsection
