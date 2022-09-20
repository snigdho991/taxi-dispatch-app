<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
    
            <ul class="metismenu list-unstyled" id="side-menu">
                @if(Auth::check())
                    @if(Auth::user()->hasRole('Administrator'))

                        <li class="menu-title" key="t-menu">Dashboard Stuff</li>
                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-calendar">Dashboard</span>
                                </a>
                            </li>
                    
                        <li class="menu-title" key="t-apps">Administrator Tools</li>
                            <li>
                                <a href="{{ route('import.bookings') }}" class="waves-effect">
                                    <i class="bx bx-receipt"></i>
                                    <span key="t-calendar">Import Bookings</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                                    <i class="bx bx-task"></i>
                                    <span key="t-multi-level">All Pending Bookings</span>
                                </a>
                                <ul class="sub-menu mm-collapse mm-show" aria-expanded="true" style="">
                                    <li><a href="{{ route('pending.bookings') }}" key="t-level-1-1" aria-expanded="false">All Pending</a></li>
                                    <li><a href="{{ route('pending.available.bookings') }}" key="t-level-1-1" aria-expanded="false">Available Bookings</a></li>
                                    <li><a href="{{ route('pending.notavailable.bookings') }}" key="t-level-1-1" aria-expanded="false">Not Available Bookings</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('accepted.bookings') }}" class="waves-effect">
                                    <i class="bx bx-aperture"></i>
                                    <span key="t-calendar">Accepted Bookings</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('uber.list') }}" class="waves-effect">
                                    <i class="bx bx-car"></i>
                                    <span key="t-calendar">Uber Bookings</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('combined.bookings') }}" class="waves-effect">
                                    <i class="bx bx-briefcase-alt-2"></i>
                                    <span key="t-calendar">Combined Bookings</span>
                                </a>
                            </li>

                        <li class="menu-title" key="t-apps">Manage Drivers</li>   
                            <li>
                                <a href="{{ route('drivers.list') }}" class="waves-effect">
                                    <i class="mdi mdi-table-clock"></i>
                                    <span key="t-calendar">Drivers List</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('approval.list') }}" class="waves-effect">
                                    <i class="bx bx-shield-quarter"></i>
                                    <span key="t-calendar">Drivers Approval</span>
                                </a>
                            </li>

            
                    @elseif(Auth::user()->hasRole('Driver'))
            
                        <li class="menu-title" key="t-menu">Dashboard Stuff</li>
                            <li>
                                <a href="{{ route('driver.dashboard') }}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-calendar">Dashboard</span>
                                </a>
                            </li>

                        <li class="menu-title" key="t-apps">Driver Tools</li>
                            <li>
                                <a href="{{ route('available.bookings') }}" class="waves-effect">
                                    <i class="bx bx-receipt"></i>
                                    <span key="t-calendar">Available Bookings</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('my.bookings') }}" class="waves-effect">
                                    <i class="bx bx-aperture"></i>
                                    <span key="t-calendar">My Bookings</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('completed.bookings') }}" class="waves-effect">
                                    <i class="bx bx-badge-check"></i>
                                    <span key="t-calendar">Completed Bookings</span>
                                </a>
                            </li>
               
                    @endif

                        <li class="menu-title" key="t-apps">Profile Tools</li>
                        
                            <li>
                                <a href="{{ url('/user/profile') }}" class="waves-effect">
                                    <i class="bx bx-news"></i>
                                    <span key="t-calendar">Manage Profile</span>
                                </a>
                            </li>

                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    
</div>