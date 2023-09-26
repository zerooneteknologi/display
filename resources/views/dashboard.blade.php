@include('partials/header')

<body>
    <main id="main-wrapper" class="main-wrapper">

        <!-- navbar vertical -->

        @include('partials/navbar')

        <!-- Sidebar -->
        @include('partials/sidebar')

        <!-- page content -->
        <div id="app-content">

            <div class="app-content-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Page header -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="mb-0 ">Starter</h3>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <!-- Scripts -->
        @include('partials/footer')