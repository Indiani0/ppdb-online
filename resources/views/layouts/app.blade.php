<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/bootstrap.css"> --}}

    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/app.css">
    <link rel="shortcut icon" href="{{ asset('template/dist') }}/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/vendors/fontawesome/all.min.css">
    <style>
        .fontawesome-icons {
            text-align: center;
        }

        article dl {
            background-color: rgba(0, 0, 0, .02);
            padding: 20px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            {{-- logo aplikasi --}}
                            <a href="{{ route('home') }}"><img src="{{ asset('img/logo_sekolah.png') }}" alt="Logo"
                                    srcset="">Menu Admin</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <x-sidebar />

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row border-bottom pb-2">
                        <div class="col-12 justify-content-end align-items-center">
                            <a class="float-end btn btn-danger text-capitalize" href="#" data-bs-toggle="modal"
                                data-bs-target="#logoutModal">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </div>
                </div>

                <section class="section pt-3">
                    @yield('content')
                </section>
            </div>

            <x-logout-modal></x-logout-modal>
        </div>
    </div>

    <script src="{{ asset('template/dist') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/js/main.js"></script>
</body>

</html>
