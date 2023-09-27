@include('partials/header')

<body>
    <main id="main-wrapper" class="main-wrapper">

        <!-- navbar vertical -->

        @include('partials/navbar')

        <!-- Sidebar -->
        @include('partials/sidebar')

        <!-- page content -->
        @yield('content')
        </div>

        <!-- Scripts -->
        @include('partials/footer')