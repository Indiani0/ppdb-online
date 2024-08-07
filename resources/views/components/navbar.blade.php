<nav class="navbar top-bar">
    <h1 class="judul"><a href="/">PPDB SMK Piramida</a></h1>
    <ul>
        @auth
            @if (Auth::user()->role_id === 3)
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="{{ route('form') }}">Formulir</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Profile</a>
                    <div class="dropdown-content">
                        <a href="#">Profile</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
            @endif
        @else
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
    </ul>
</nav>
