<!-- Sidebar -->
<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard') }}">
                <h3>{{ config('app.name') }}</h3>
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item d-none d-lg-flex me-3"></div>
            <div class="d-none d-lg-flex"></div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>

                <!-- Properties -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('property_index') || request()->routeIs('property_create') || request()->routeIs('property_store') || request()->routeIs('property_edit') || request()->routeIs('property_show') || request()->routeIs('property_delete') || request()->routeIs('property_update') ? 'active' : '' }}"
                        href="#" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                        aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <x-backend.svg.hotel-svg />
                        </span>
                        <span class="nav-link-title">
                            Properties
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item {{ request()->routeIs('property_index') ? 'active' : '' }}"
                                    href="{{ route('property_index') }}">
                                    <x-backend.svg.submenu-svg />
                                    Property List
                                </a>
                                <a class="dropdown-item {{ request()->routeIs('property_create') ? 'active' : '' }}"
                                    href="{{ route('property_create') }}">
                                    <x-backend.svg.submenu-svg />
                                    Create Property
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Services -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('category.index') || request()->routeIs('category.create') || request()->routeIs('category.store') || request()->routeIs('category.edit') || request()->routeIs('category.destroy') || request()->routeIs('category.show') ? 'active' : '' }}"
                        href="#" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                        aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <x-backend.svg.service-svg />
                        </span>
                        <span class="nav-link-title">
                            Services
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">

                                <a class="dropdown-item {{ request()->routeIs('category.index') ? 'active' : '' }}"
                                    href="{{ route('category.index') }}">
                                    <x-backend.svg.submenu-svg />
                                    Service Type
                                </a>

                                <a class="dropdown-item {{ request()->routeIs('products.index') ? 'active' : '' }}"
                                    href="{{ route('products.index') }}">
                                    <x-backend.svg.submenu-svg />
                                    Service List
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- User -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.list') ? 'active' : '' }}"
                        href="{{ route('user.list') }}">
                    <x-backend.svg.user-svg />
                        <span class="nav-link-title">
                            User
                        </span>
                    </a>
                </li>

                <!-- Roles & Permissions -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('roles.permission.index') || request()->routeIs('roles.permission.create') || request()->routeIs('store.roles') || request()->routeIs('permissions.create') || request()->routeIs('assign.role') || request()->routeIs('assign.permission') ? 'active' : '' }}"
                        href="{{ route('roles.permission.index') }}">

                        <x-backend.svg.people-svg />
                        <span class="nav-link-title">
                            Roles & Permissions
                        </span>
                    </a>
                </li>

                <!-- Home Page Content -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.page.index') ? 'active' : '' }}"
                        href="{{ route('home.page.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <x-backend.svg.book-svg />
                        </span>
                        <span class="nav-link-title">
                                Home Page Content
                        </span>

                    </a>
                </li>
                <!-- Custom Page -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('custom.page.index') || request()->routeIs('custom.page.edit') || request()->routeIs('custom.page.update') ? 'active' : '' }}"
                        href="{{ route('custom.page.index') }}">
                    <x-backend.svg.book-svg />
                        <span class="nav-link-title">
                            Custom Page
                        </span>
                    </a>
                </li>


                <!-- FAQ -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('faq.index') ? 'active' : '' }}"
                        href="{{ route('faq.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <x-backend.svg.faq-svg />
                        </span>
                        <span class="nav-link-title">
                            FAQ
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
