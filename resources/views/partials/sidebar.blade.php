<div class="navbar-vertical navbar nav-dashboard">
    <div class="h-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand" href="../index.html">
            {{-- <img src="../assets/images/brand/logo/logo-2.svg" alt="dash ui - bootstrap 5 admin dashboard template">
            --}}
            <h4>DISPLAY</h4>
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">

            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Menu</div>
            </li>
            <!-- Nav item -->

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="{{ route('home')}}" data-bs-toggle="collapse"
                    data-bs-target="#navDashboard" aria-expanded="false" aria-controls="navDashboard">
                    <i data-feather="home" class="nav-icon me-2 icon-xxs"></i>
                    Home
                </a>

                <div id="navDashboard" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="../pages/dashboard-analytics.html">
                                Analytics </a>
                        </li>
                    </ul>
                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed {{ Request::is('organizer*') ? 'active' : '' }}" href="#"
                    data-bs-toggle="collapse" data-bs-target="#aparatur" aria-expanded="false" aria-controls="aparatur">
                    <i data-feather="users" class="nav-icon me-2 icon-xxs"></i>
                    Aparatur
                </a>

                <div id="aparatur" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('organizer') ? 'active' : '' }}"
                                href="{{ route('organizer.index')}}">
                                Daftar Aparatur </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('organizer/create') ? 'active' : '' }}"
                                href="{{ route('organizer.create') }}">
                                Tambah Aparatur </a>
                        </li>
                    </ul>
                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link has-arrow " href="../pages/calendar.html">
                    <i data-feather="users" class="nav-icon me-2 icon-xxs">
                    </i> Aparatur
                </a>
            </li>

        </ul>

    </div>
</div>