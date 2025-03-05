<div
    class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
    <nav class="mt-2">
        <ul class="nav sidebar-toggle  nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
            role="menu"
            data-accordion="true">
            @canany(['permission.show', 'roles.show', 'user.show'])
                <li class="nav-item has-treeview ">
                    <a href="#"
                       class="nav-link {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'active' : '' }}">
                        <i class="fas fa-users-cog"></i>
                        <p>
                            Ruxsatlar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="display: {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'block' : 'none' }};">
                        @can('permission.show')
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}"
                                   class="nav-link {{ Request::is('permission*') ? 'active' : '' }}">
                                    <i class="fas fa-key"></i>
                                    <p> Rollar</p>
                                </a>
                            </li>
                        @endcan

                        @can('roles.show')
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}"
                                   class="nav-link {{ Request::is('role*') ? 'active' : '' }}">
                                    <i class="fas fa-user-lock"></i>
                                    <p>Rollar</p>
                                </a>
                            </li>
                        @endcan

                        @can('user.show')
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                   class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                                    <i class="fas fa-user-friends"></i>
                                    <p>Foydalanuvchilar</p>
                                </a>
                            </li>
                        @endcan
                    </ul>

                </li>
            @endcanany

        </ul>
    </nav>
</div>
