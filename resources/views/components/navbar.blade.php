<nav class="navbar top-bar">
    <h1 class="judul"><a href="/">PPDB SMK Piramida</a></h1>
    <ul>
        @auth
            @if (Auth::user()->role_id === 3)
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="{{ route('form') }}">Formulir PPDB</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </li>
            @endif
        @else
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
    </ul>
</nav>
