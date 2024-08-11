<div class="sidebar-menu">
    <ul class="menu">
        {{-- Halaman Utama --}}
        <li class="sidebar-title">Dashboard</li>
        <li class="sidebar-item">
            <a href="{{ route('beranda') }}" class='sidebar-link'>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('form') }}" class='sidebar-link'>
                <span>Formulir PPDB</span>
            </a>
        </li>

        {{-- Dashboard Admin --}}
        <li class="sidebar-title">User Management</li>
        <li class="sidebar-item">
            <a href="{{ route('home') }}" class='sidebar-link'>
                <span>Dashboard {{ ucwords(Auth::user()->name) }}</span>
            </a>
        </li>
        @if (Auth::user()->role_id === 1)
            <li class="sidebar-item">
                <a href="{{ route('users.index') }}" class='sidebar-link'>
                    <span>Data User</span>
                </a>
            </li>
        @endif

        {{-- Data Calon Siswa & Data Klasifikasi --}}
        <li class="sidebar-title">Master Data</li>
        <li class="sidebar-item">
            <a href="{{ route('student') }}" class='sidebar-link'>
                <span>Peserta Didik</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('classification') }}" class='sidebar-link'>
                <span>Klasifikasi C4.5</span>
            </a>
        </li>
    </ul>
</div>
