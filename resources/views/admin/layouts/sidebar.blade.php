<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"
        style="display: {{ Request::is('permission*') || Request::is('role*') || Request::is('users*') ? '' : 'block' }};">

        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Bosh sahifa</p>
            </a>
        </li>


                @canany(['permission.show', 'roles.show', 'users.show'])
        <li class="nav-item {{ Request::is('permission*') || Request::is('role*') || Request::is('users*') || Request::is('departments*') ? 'menu-open' : '' }}">
            <a href="#"
               class="nav-link {{ Request::is('permission*') || Request::is('role*') || Request::is('users*') || Request::is('departments*') ? 'active' : '' }}">
                <i class="fa-solid fa-gears"></i>
                <p>
                    Tuzilma
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    @can('permission.show')
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}"
                               class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                                <i class="fa-solid fa-key"></i>
                                <p>Ruxsatlar</p>
                            </a>
                        </li>
                    @endcan

                    @can('roles.show')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                               class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                                <i class="fa-solid fa-users-gear"></i>
                                <p>Rollar</p>
                            </a>
                        </li>
                    @endcan

                    @can('users.show')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                               class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                                <i class="fa fa-user"></i>
                                <p>Foydalanuvchilar</p>
                            </a>
                        </li>
                    @endcan


            </ul>
        </li>

    @endcanany
</nav>
<!-- /.sidebar-menu -->
