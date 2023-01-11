
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Pembekalan - Efektifpro Knowledge Source</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Aplikasi Pembekalan Efektifpro Knowledge Source" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('assets/images/efpro.png') }}">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>       

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        @stack('css')
        <script src="{{ asset('assets/js/head.js') }}"></script>

    </head>

    <body  data-layout-mode="detached" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
        <div id="wrapper">
            @include('layouts.partials.topbar')

            @include('layouts.partials.sidebar')

            <div class="content-page">
                <div class="content">
                    @yield('content')
                </div>

                @include('layouts.partials.footer')

            </div>
        </div>
        <!-- END wrapper -->

        <div class="rightbar-overlay"></div>
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        @stack('javascript')

        <script src="{{ asset('assets/js/app.min.js') }}"></script>

        

        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
       
       <script>
            
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );

            $(document).ready( function () {
                $('#tabelPic').DataTable();
            } );

        </script>
    </body>
</html>
