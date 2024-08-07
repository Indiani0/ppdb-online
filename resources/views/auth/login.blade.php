<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/app.css">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/pages/auth.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login_style.css">
</head>

<body>
    <x-layout>
        <br><br><br>
        <div id="auth">
            <div class="login">
                <div class="header-login">
                    <h1>Login PPDB Online</h1>
                    <p>Masuk dengan data yang Anda masukkan saat registrasi</p>
                </div>

                <div class="form-login">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control form-control-xl"
                                placeholder="Email" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password"
                                placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="flexCheckDefault"
                                id="flexCheckDefault" value="">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <br>
                        <a href="{{ route('register') }}" class="nav-link">Belum memiliki akun? Daftar Disini!</a>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </x-layout>
</body>

</html>
