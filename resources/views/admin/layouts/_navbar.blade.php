<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{route('dashboard')}}" class="b-brand text-primary">
                <img src="https://html.phoenixcoded.net/light-able/bootstrap/assets/images/logo-dark.svg"
                    alt="logo image" class="" />
                <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version">v1.0</span>
            </a>
        </div>
        @include('admin.layouts._sidebar')
        <div class="card pc-user-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="{{asset('assets')}}/images/user/avatar-1.jpg" alt="user-image"
                            class="user-avtar wid-45 rounded-circle" />
                    </div>
                    <div class="flex-grow-1 ms-3 me-2">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <small>{{ Auth::user()->is_admin ? 'Admin' : 'User' }}</small>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="btn btn-icon btn-link-secondary avtar arrow-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="0,20">
                            <i class="ph-duotone ph-windows-logo"></i>
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="pc-user-links">
                                        <i class="ph-duotone ph-user"></i>
                                        <span>My Account</span>
                                    </a></li>
                                <li>
                                    <a href="{{route('auth.logout')}}" class="pc-user-links">
                                    <i class="ph-duotone ph-power"></i>
                                        <button type="submit" class="nav-link" role="button">
                                            Logout
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
