<nav class="navbar top-bar">
    <h1 class="judul"><a href="/">PPDB SMK Piramida</a></h1>
    <ul>
        @auth
            @if (Auth::user()->role_id === 3)
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="{{ route('form') }}">Formulir</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif
        @else
            <li><a href="{{ route('beranda') }}">Home</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
    </ul>
</nav>
