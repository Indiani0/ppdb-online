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
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endif
        @else
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
    </ul>
</nav>
