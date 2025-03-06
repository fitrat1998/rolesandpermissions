<div class="sidebar os-host os-theme-light">
    <nav class="mt-2">

        @canany(['permission.show', 'roles.show', 'user.show'])
            <ul class="nav sidebar-toggle nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="true">

                <!-- ✅ Bosh sahifa -->

                <li class="nav-item">

                    <a href="{{ route('index') }}"
                       class="nav-link {{ request()->routeIs('/') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <p> {{  __('messages.home') }}</p>
                    </a>
                </li>

                <!-- ✅ Ruxsatlar bo'limi -->
                <li class="nav-item">
                    <a href="#"
                       class="nav-link {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'active' : '' }}">
                        <i class="fas fa-users-cog"></i>
                        <p>
                            {{  __('messages.system') }}
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
                                    <p>{{  __('messages.permissions') }}</p>
                                </a>
                            </li>
                        @endcan

                        @can('roles.show')
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}"
                                   class="nav-link {{ Request::is('role*') ? 'active' : '' }}">
                                    <i class="fas fa-user-lock"></i>
                                    <p>{{  __('messages.roles') }}</p>
                                </a>
                            </li>
                        @endcan

                        @can('user.show')
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                   class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                                    <i class="fas fa-user-friends"></i>
                                    <p>{{  __('messages.users') }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                <!-- Tilni tanlash bo'limi -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-language"></i>
                        <p>
                            {{ __('messages.lang.title') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('changeLocale', 'uz') }}"
                               class="nav-link {{ app()->getLocale() == 'uz' ? 'active' : '' }}">

                                <p><img src="{{ asset('uz.png') }}" alt="lang" width="24"> {{ __('messages.lang.uz') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('changeLocale', 'en') }}"
                               class="nav-link {{ app()->getLocale() == 'en' ? 'active' : '' }}">

                                <p><img src="{{ asset('en.png') }}" alt="lang" width="24"> {{ __('messages.lang.en') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('changeLocale', 'ru') }}"
                               class="nav-link {{ app()->getLocale() == 'ru' ? 'active' : '' }}">

                                <p><img src="{{ asset('ru.png') }}" alt="lang" width="24"> {{ __('messages.lang.ru') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        @endcanany
    </nav>
</div>
