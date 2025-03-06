<div
    class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
    <nav class="mt-2">
        <ul class="nav sidebar-toggle nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
            role="menu" data-accordion="true">

            <!-- Ruxsatlar bo'limi -->
            @canany(['permission.show', 'roles.show', 'user.show'])
                <li class="nav-item has-treeview {{ Request::is('permissions*') || Request::is('roles*') || Request::is('users*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('permissions*') || Request::is('roles*') || Request::is('users*') ? 'active' : '' }}">
                        <i class="fas fa-users-cog"></i>
                        <p>
                            {{ __('Ruxsatlar') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="display: {{ Request::is('permissions*') || Request::is('roles*') || Request::is('users*') ? 'block' : 'none' }};">

                        @can('permission.show')
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}"
                                   class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                                    <i class="fas fa-key"></i>
                                    <p>{{ __('Ruxsatlar') }}</p>
                                </a>
                            </li>
                        @endcan

                        @can('roles.show')
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}"
                                   class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                                    <i class="fas fa-user-lock"></i>
                                    <p>{{ __('Rollar') }}</p>
                                </a>
                            </li>
                        @endcan

                        @can('user.show')
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                   class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                                    <i class="fas fa-user-friends"></i>
                                    <p>{{ __('Foydalanuvchilar') }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany



        </ul>
    </nav>
</div>
