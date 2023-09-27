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
                        <li class="nav-item">
                            <a class="nav-link " href="../index.html">
                                Project </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link has-arrow   " href="../pages/dashboard-ecommerce.html">
                                Ecommerce
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow   " href="../pages/dashboard-crm.html">
                                CRM
                            </a>



                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow   " href="../pages/dashboard-finance.html">
                                Finance
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow   " href="../pages/dashboard-blog.html">
                                Blog
                            </a>

                        </li>



                    </ul>
                </div>

            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Apps</div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow " href="../pages/calendar.html">
                    <i data-feather="calendar" class="nav-icon me-2 icon-xxs">
                    </i> Calendar
                </a>
            </li>

        </ul>

    </div>
</div>