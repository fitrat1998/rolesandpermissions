<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">{{ __('Menu') }}</li>

        <!-- Dashboard -->
        <li class="sidebar-item {{ request()->routeIs('index') ? 'active' : '' }}">
            <a href="{{ route('index') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>{{ __('messages.home') }}</span>
            </a>
        </li>

        <!-- System Management -->
        @canany(['permission.show', 'roles.show', 'user.show'])
            <li class="sidebar-item has-sub {{ request()->routeIs('system.*') ? 'active' : '' }}">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-gear-fill"></i>
                    <span>{{ __('messages.system') }}</span>
                </a>

                <ul class="submenu">
                    @can('permission.show')
                        <li class="submenu-item {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                            <a href="{{ route('permissions.index') }}" class="submenu-link">{{ __('Permissions') }}</a>
                        </li>
                    @endcan

                    @can('roles.show')
                        <li class="submenu-item {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                            <a href="{{ route('roles.index') }}" class="submenu-link">{{ __('Roles') }}</a>
                        </li>
                    @endcan

                    @can('user.show')
                        <li class="submenu-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class="submenu-link">{{ __('Users') }}</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        <!-- Language Selection -->
        <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-translate"></i>
                <span>{{ __('messages.lang.title') }}</span>
            </a>

            <ul class="submenu">
                <li class="submenu-item {{ app()->getLocale() == 'uz' ? 'active' : '' }}">
                    <a href="{{ route('changeLocale', 'uz') }}" class="submenu-link">
                        <img src="{{ asset('uz.png') }}" alt="lang" width="24"> {{ __('messages.lang.uz') }}
                    </a>
                </li>

                <li class="submenu-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                    <a href="{{ route('changeLocale', 'en') }}" class="submenu-link">
                        <img src="{{ asset('en.png') }}" alt="lang" width="24"> {{ __('messages.lang.en') }}
                    </a>
                </li>

                <li class="submenu-item {{ app()->getLocale() == 'ru' ? 'active' : '' }}">
                    <a href="{{ route('changeLocale', 'ru') }}" class="submenu-link">
                        <img src="{{ asset('ru.png') }}" alt="lang" width="24"> {{ __('messages.lang.ru') }}
                    </a>
                </li>
            </ul>
        </li>

        <!-- Logout -->
        <li class="sidebar-item">
            <a href="{{ route('logout') }}" class="sidebar-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>{{ __('Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</div>
