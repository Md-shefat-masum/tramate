<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('contents/admin')}}/assets/images/favicon.png">
    <title>Admin Press Admin Template - The Ultimate Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('contents/admin')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{asset('contents/admin')}}/assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('contents/admin')}}/css/style1.css" rel="stylesheet">
    <link href="{{asset('contents/admin')}}/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('contents/admin')}}/css/colors/blue.css" id="theme" rel="stylesheet">

    <script src="{{asset('contents/admin')}}/assets/plugins/jquery/jquery.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/sweetalert.min.js"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">
        @yield('admin')
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('contents/admin')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('contents/admin')}}/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{asset('contents/admin')}}/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{asset('contents/admin')}}/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="{{asset('contents/admin')}}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('contents/admin')}}/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="{{asset('contents/admin')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="{{asset('contents/admin')}}/assets/plugins/raphael/raphael-min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/plugins/morrisjs/morris.min.js"></script>
    <!-- Chart JS -->
    <script src="{{asset('contents/admin')}}/js/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('contents/admin')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
