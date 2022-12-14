<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">

                @if(Auth::check())
                    @if(Auth::user()->role == 'Administrator')
                        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    @elseif(Auth::user()->role == 'Driver')
                        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    @endif
                            <span class="logo-sm">
                                <img src="{{ config('core.image.default.logoadmin') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ config('core.image.default.logoadmin') }}" class="editPro" alt="" height="60" width="140">
                            </span>
                        </a>
                @endif

                @if(Auth::check())
                    @if(Auth::user()->role == 'Administrator')
                        <a href="{{ route('admin.dashboard') }}" class="logo logo-lights">
                    @elseif(Auth::user()->role == 'Driver')
                        <a href="{{ route('admin.dashboard') }}" class="logo logo-lights">
                    @endif
                            <span class="logo-sm">
                                <img src="{{ config('core.image.default.logoadmin') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ config('core.image.default.logoadmin') }}" class="editPro" alt="" height="60" width="140">
                            </span>
                        </a>
                @endif

            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                {{-- <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ config('core.image.default.avatar') }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ url('/user/profile') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                    {{-- <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
                    <a class="dropdown-item d-block" href="{{ url('/user/profile') }}"><span class="badge bg-success float-end">new</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a> --}}
                    
                    <div class="dropdown-divider"></div>                    

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-danger dropdown-item">
                            <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>

                            <span key="t-logout">
                                {{ __('Log out') }}
                            </span>                            
                        </button>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header>