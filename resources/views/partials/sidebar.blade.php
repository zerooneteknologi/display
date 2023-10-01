<div class="navbar-vertical navbar nav-dashboard">
    <div class="h-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand" href="../index.html">
            <img src="../assets/images/brand/logo/logo-2.svg" alt="dash ui - bootstrap 5 admin dashboard template">
            <h4 class="d-inline">DISPLAY</h4>
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
                <a class="nav-link has-arrow {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home')}}">
                    <i data-feather="home" class="nav-icon me-2 icon-xxs"></i>
                    Home
                </a>

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
                <a class="nav-link has-arrow  collapsed {{ Request::is('gallery*') ? 'active' : '' }}" href="#"
                    data-bs-toggle="collapse" data-bs-target="#gallery" aria-expanded="false" aria-controls="gallery">
                    <i data-feather="film" class="nav-icon me-2 icon-xxs"></i>
                    Galeri
                </a>

                <div id="gallery" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('gallery') ? 'active' : '' }}"
                                href="{{ route('gallery.index')}}">
                                Daftar Galeri </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('gallery/create') ? 'active' : '' }}"
                                href="{{ route('gallery.create') }}">
                                Tambah Galeri </a>
                        </li>
                    </ul>
                </div>

            </li>

        </ul>

    </div>
</div>