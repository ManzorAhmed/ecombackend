<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Vogue Fitness</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Manage Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('create', App\Models\User::class)
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                   class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-alt"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                                @endcan
                            </li>
                            <li class="nav-item">
                                @if(shouldDisplayLink('role-admin', 'permission-admin'))
                                    <a href="{{ route('users.create') }}"
                                       class="nav-link {{ request()->is('admin/users/create') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user-alt"></i>
                                        <p>
                                            Add User
                                        </p>
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.profile') }}"
                                   class="nav-link {{ request()->is('admin/profile-setting') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-alt"></i>
                                    <p>
                                        Update Profile
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                @php
                                    $user = auth()->user();
                                    $isAdmin = $user->hasRole('role-admin');
                                    $hasAdminPermission = $user->hasPermission('permission-admin');
                                @endphp

                                 Debugging Output
                                                                <p>User Roles: {{ $user->roles->pluck('name')->implode(', ') }}</p>
                                                                <p>User Permissions: {{ $user->permissions->pluck('name')->implode(', ') }}</p>
                                                                <p>Is Admin Role: {{ $isAdmin ? 'Yes' : 'No' }}</p>
                                                                <p>Has Admin Permission: {{ $hasAdminPermission ? 'Yes' : 'No' }}</p>

                                {{-- Display Link Based on Role and Permission --}}
                                @if($isAdmin)
                                    <a href="{{ route('roles.index') }}"
                                       class="nav-link {{ request()->is('admin/roles') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user-tag"></i>
                                        <p>Roles</p>
                                    </a>
                                @endif

                                @if($hasAdminPermission)
                                    <a href="{{ route('permissions.index') }}"
                                       class="nav-link {{ request()->is('admin/permissions') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-key"></i>
                                        <p>Permissions</p>
                                    </a>
                                @endif
                            </li>

                    </ul>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('setting.index') }}"
                        class="nav-link {{ request()->is('admin/setting') ? 'active' : '' }}"">
                        <i class=" nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    @if(shouldDisplayLink('role-admin', 'permission-admin'))
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                General Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    @endif
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(shouldDisplayLink('role-admin', 'permission-admin'))
                                <a href="{{ route('admin.general.site.identity') }}"
                                   class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Site Identity
                                    </p>
                                </a>
                            @endif
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.general.site.identity') }}"
                               class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Basic Setting
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.general.smtp.settings') }}"
                               class="nav-link {{ request()->is('admin/profile-setting') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    SMTP Settings
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    @if(shouldDisplayLink('role-admin', 'permission-admin'))
                        <a href="{{ route('logs.index') }}"
                           class="nav-link {{ request()->is('admin/logs') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-exclamation-circle"></i>
                            <p>
                                Logs
                            </p>
                        </a>
                    @endif
                </li>
{{--                <li class="nav-item">--}}
{{--                    @can('create')--}}
{{--                        <a href="{{ route('agenda.index') }}" class="nav-link {{ request()->is('admin/agenda') ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-address-book"></i>--}}
{{--                            <p>--}}
{{--                                Manage Agenda--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    @endcan--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    @if(shouldDisplayLink('role-admin', 'permission-admin'))--}}
{{--                        <a href="{{ route('navbar.index') }}"--}}
{{--                           class="nav-link {{ request()->is('admin/navbar') ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-hamburger"></i>--}}
{{--                            <p>--}}
{{--                                Manage Navbar/Header--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </li>--}}
                <li class="nav-item">
                    @if(shouldDisplayLink('role-admin', 'permission-admin'))
                        <a href="{{ route('active_abu_dhabi.index') }}"
                           class="nav-link {{ request()->is('admin/active_abu_dhabi') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-alt-slash"></i>
                            <p>
                                Manage Active Abu Dhabi
                            </p>
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(shouldDisplayLink('role-admin', 'permission-admin'))
                        <a href="{{ route('category.index') }}"
                           class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cart-plus"></i>
                            <p>
                                Manage Category
                            </p>
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(shouldDisplayLink('role-admin', 'permission-admin'))
                        <a href="{{ route('product.index') }}"
                           class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-shopping-cart"></i>
                            <p>
                                Manage Product
                            </p>
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(shouldDisplayLink('role-admin', 'permission-admin'))
                        <a href="{{ route('email.index') }}"
                           class="nav-link {{ request()->is('admin/email') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>
                                Manage Email
                            </p>
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(shouldDisplayLink('role-admin', 'permission-admin'))
                        <a href="{{ route('payment_gateway.index') }}"
                           class="nav-link {{ request()->is('admin/email') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>
                                Manage Payment Gateway
                            </p>
                        </a>
                    @endif
                </li>

{{--                <li class="nav-item">--}}
{{--                    @if(shouldDisplayLink('role-admin', 'permission-admin'))--}}
{{--                        <a href="{{ route('gateway.index') }}"--}}
{{--                           class="nav-link {{ request()->is('admin/gateway') ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-credit-card"></i>--}}
{{--                            <p>--}}
{{--                                Manage Gateway Manual--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Sections
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.general.slider')}}"
                               class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Slider
                                </p>
                            </a>
                        </li>
                        {{--                        <li class="nav-item">--}}
                        {{--                            <a href="{{route('admin.general.speaker')}}"--}}
                        {{--                                class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">--}}
                        {{--                                <i class="far fa-circle nav-icon"></i>--}}
                        {{--                                <p>--}}
                        {{--                                    Speaker--}}
                        {{--                                </p>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
