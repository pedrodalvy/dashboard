<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>


    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('pnotify/PNotify.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pnotify/PNotifyBootstrap4.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('vendor/gijgo/css/gijgo.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('img/favicon_2.png') }}" />
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        @yield('wrapper')

    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- jQuery Validation-->
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/localization/messages_pt_BR.js') }}"></script>
    <script src="{{ asset('js/validate.js') }}"></script>

    <!-- Jquery Mask -->
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/mask.js') }}"></script>

    <!-- Date Plugins -->
    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/gijgo/js/gijgo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gijgo/js/messages/messages.pt-br.js') }}" type="text/javascript"></script>
    

    <!-- PNotify -->
    <script type="text/javascript" src="{{ asset('pnotify/PNotify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pnotify/PNotifyBootstrap4.js') }}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>

    @include('admin.layouts.loading')

    @include('admin.layouts.alert')

    @hasSection ('script')
    @yield('script')
    @endif

</body>

</html>
