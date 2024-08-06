<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        <a href="{{ route('home') }}" class='sidebar-link'>
            <span>Dashboard Admin</span>
        </a>
        </li>
        <li class="sidebar-title">Master Data</li>
        <li class="sidebar-item  ">
            <a href="{{ route('users.index') }}" class='sidebar-link'>
                <span>Data User</span>
            </a>
        </li>
        <li class="sidebar-item  ">
            <a href="{{ route('roles.index') }}" class='sidebar-link'>
                <span>Data Role</span>
            </a>
        </li>
    </ul>
</div>
