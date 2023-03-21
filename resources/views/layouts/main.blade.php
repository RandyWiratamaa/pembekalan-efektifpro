
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
              
        <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/dropify/css/dropify.min.css" rel="stylesheet') }}" type="text/css" />
        <link href="{{ asset('assets/libs/mohithg-switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/select2/css/select2.min.css" rel="stylesheet') }}" type="text/css" />
        <link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
        @stack('css')
        <script src="{{ asset('assets/js/head.js') }}"></script>
        <script src="{{ asset('jquery-3.6.4.min.js') }}"></script>
        <script src="moment.js"></script>

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

        <script src="{{ asset('assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
        <script src="{{ asset('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
       
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>

        <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dropify/js/dropify.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-fileuploads.init.js') }}"></script>
        <script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    
        <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
        <script src="{{ asset('assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
        
    </body>
</html>
