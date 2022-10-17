
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Pembekalan - Efektifpro Knowledge Source</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Aplikasi Pembekalan Efektifpro Knowledge Source" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/head.js') }}"></script>

    </head>

    <body  data-layout-mode="detached" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
        <div id="wrapper">
            @include('layouts.partials.topbar')

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.partials.sidebar')
            <!-- Left Sidebar End -->


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    @yield('content')
                </div>

                <!-- Footer Start -->
                @include('layouts.partials.footer')
                <!-- end Footer -->

            </div>
        </div>
        <!-- END wrapper -->

        <div class="rightbar-overlay"></div>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/libs/morris.js06/morris.min.js"></script>
        <script src="assets/libs/raphael/raphael.min.js"></script>
        <script src="assets/js/pages/dashboard-4.init.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>
</html>
