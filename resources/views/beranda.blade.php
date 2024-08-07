<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/beranda_style.css">
</head>

<body>
    <div class="hero">
        <div class="header-hero">
            <h1>PPDB TELAH DIBUKA</h1>
            <h2>Tahun Ajaran 2024/2025</h2>
            <p><a href="/register">Daftar Sekarang!</a></p>
        </div>
    </div>
    <x-layout>
        <div class="sekolah">
            <h1>Profil SMK Piramida</h1>
            <p>Sekolah Menengah Kejuruan (SMK) Piramida adalah sekolah umum yang unggul di Kecamatan Rancaekek
                Kabupaten Bandung, Jawa Barat. Wujud keunggulan pada SMK Piramida
                akan
                dicerminkan mulai dari kelembagaan pengelola, kompetensi lulusan, dan kualifikasi masukan,
                kurikulum
                pendidikan, tenaga kependidikan hingga sarana prasarana penunjang pendidikan berkualitas.
            </p>
        </div>
        <hr>
        <div class="box-content">
            <div class="jurusan card-content">
                <h2>Pilihan Jurusan</h2>
                <ul>
                    <li>
                        <img src="img/jurusan_1.png" alt="Teknik Pembuatan Kain">
                        <figcaption>Teknik Pembuatan Kain</figcaption>
                    </li>
                    <li>
                        <img src="img/jurusan_2.png" alt="Teknik Elektro Industri">
                        <figcaption>Teknik Elektro Industri</figcaption>
                    </li>
                    <li>
                        <img src="img/jurusan_3.png" alt="Layanan Perbankan Syariah">
                        <figcaption>Layanan Perbankan Syariah</figcaption>
                    </li>
                </ul>
            </div>

            <div class="dokumen card-content">
                <h2>Dokumen Persyaratan</h2>
                <div id="carouselExampleIndicators" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/dokumen_1.png') }}" class="d-block w-100 custom-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/dokumen_2.png') }}" class="d-block w-100 custom-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/dokumen_3.png') }}" class="d-block w-100 custom-img" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="ekstrakulikuler card-content">
                <h2>Ektrakulikuler</h2>
                <ul>
                    <li>
                        <img src="{{ asset('img/paskibra.jpg') }}" alt="">
                        <figcaption>Pramuka</figcaption>
                    </li>
                    <li>
                        <img src="{{ asset('img/futsal.jpg') }}" alt="">
                        <figcaption>Futsal</figcaption>
                    </li>
                </ul>
            </div>
        </div>
    </x-layout>
</body>

</html>
