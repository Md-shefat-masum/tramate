<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Travel Agency | travel agency html Template </title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('contents/website')}}/favicon.ico" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/bootstrap.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/fontawesome.min.css">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/animate.css">
    <!-- flaticon -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/flaticon.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/owl.carousel.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/magnific-popup.css">
    <!-- date time picker -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/datatables.min.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/responsive.css">

    <script src="{{asset('contents/website')}}/assets/js/jquery.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/sweetalert.min.js"></script>
</head>

<body>

    <!-- navbar area start -->
    <nav class="navbar navbar-area navbar-expand-lg absolute">
        <div class="container nav-container">
            <div class="logo-wrapper navbar-brand">
                <a href="{{url('/')}}" class="logo ">
                    <img src="{{asset('contents/website')}}/assets/img/logo.png" alt="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="hostinglab">
                <!-- navbar collapse start -->
                <ul class="navbar-nav">
                    <!-- navbar- nav -->
                    <li class="nav-item {{Request::is('/')? 'active':''}}">
                        <a class="nav-link pl-0" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item {{Request::is('about')? 'active':''}}">
                        <a class="nav-link" href="{{url('about')}}">About</a>
                    </li>
                    <li class="nav-item {{Request::is('packages')? 'active':''}}">
                        <a class="nav-link" href="{{url('packages')}}">Package</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu">
                            <a href="{{url('gallery')}}" class="dropdown-item">Gallery</a>
                            <a href="{{url('team')}}" class="dropdown-item">Team</a>
                            <a href="{{url('price')}}" class="dropdown-item">Price</a>
                            <a href="{{url('404')}}" class="dropdown-item">404</a>
                        </div>
                    </li>
                    <li class="nav-item {{Request::is('blog')? 'active':''}}">
                            <a class="nav-link" href="{{url('blog')}}">Blog</a>
                    </li>
                    <li class="nav-item {{Request::is('contact')? 'active':''}}">
                        <a class="nav-link" href="{{url('contact')}}">Contact</a>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar btn wrapper -->
            <div class="responsive-mobile-menu">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hostinglab" aria-controls="hostinglab" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- navbar collapse end -->
        </div>
    </nav>
    <!-- navbar area end -->

    @yield('website')

    <!-- footer area start -->
    <footer class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget footer-widget about_widget">
                            <a href="{{url('/')}}" class="footer-logo"><img src="{{asset('contents/website')}}/assets/img/footer-logo.png" alt="footer logo image"></a>
                            <p>Satisfied conveying an dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget footer-widget pages">
                            <h4 class="widget-title">About</h4>
                            <ul>
                                <li><a href="#">About Stoneworks</a></li>
                                <li><a href="#">How it works</a></li>
                                <li><a href="#">Team</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget footer-widget pages">
                            <h4 class="widget-title">Conditions</h4>
                            <ul>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Investors</a></li>
                                <li><a href="#">Finance Reports</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget footer-widget pages">
                            <h4 class="widget-title">Pages</h4>
                            <ul>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Advertisement</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <!-- sopyright area -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-inner">
                            &copy; 2019 All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- //. copyright area -->
    </footer>
    <!-- footer area end -->


    <div class="back-to-top base-color-2">
        <i class="fas fa-rocket"></i>
    </div>

    <!-- jquery -->
    <!-- popper -->
    <script src="{{asset('contents/website')}}/assets/js/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="{{asset('contents/website')}}/assets/js/bootstrap.min.js"></script>
    <!-- way poin js-->
    <script src="{{asset('contents/website')}}/assets/js/waypoints.min.js"></script>
    <!-- owl carousel -->
    <script src="{{asset('contents/website')}}/assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="{{asset('contents/website')}}/assets/js/jquery.magnific-popup.js"></script>
    <!-- wow js-->
    <script src="{{asset('contents/website')}}/assets/js/wow.min.js"></script>
    <!-- counterup js-->
    <script src="{{asset('contents/website')}}/assets/js/jquery.counterup.min.js"></script>
    <!-- datetime picker js-->
    <script src="{{asset('contents/website')}}/assets/js/bootstrap-datepicker.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqFuLx8S7A8eianoUhkYMeXpGPvsXp1NM&amp;callback=initMap" async defer></script>
    <!-- google map activate js -->
    <script src="{{asset('contents/website')}}/assets/js/goolg-map-activate.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/datatables.min.js"></script>
    <!-- main -->
    <script src="{{asset('contents/website')}}/assets/js/main.js"></script>
    <script>$(document).ready( function () {
        $('#table_id').DataTable({
            "pageLength": 5
        });

    } );</script>


</body>

</html>
