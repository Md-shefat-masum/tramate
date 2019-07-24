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
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('contents/website')}}/favicon.ico">
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
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header" style="background: #1976d2;">
                    <a class="navbar-brand" href="{{url('/')}}" >

                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="{{asset('contents/website')}}/assets/img/logo.png" alt="homepage"
                                class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{asset('contents/admin')}}/assets/images/logo-light-text.png" class="light-logo"
                                alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a
                                class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="index.html#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new
                                                        admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="index.html#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that
                                                        you have event</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="index.html#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this
                                                        template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="index.html#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                        admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                                notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                                <ul>
                                    <li>
                                        @php
                                        $all=App\Contact::where('message_status', 1)->orderBy('message_id',
                                        'DESC')->limit(5)->get();
                                        $pretotalmes=App\MessageCount::select('count')->firstOrFail();
                                        @endphp
                                        <div class="drop-title">You have {{$pretotalmes->count}} new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            @foreach ($all as $msg)
                                            <a href="{{route('contact_message_view',$msg->message_slug)}}">
                                                <div class="user-img"> <img
                                                        src="{{asset('contents/admin')}}/assets/images/users/1.jpg"
                                                        alt="user" class="img-circle"></div>
                                                <div class="mail-contnet">
                                                    <h5>{{$msg->message_f_name}}</h5> <span
                                                        class="mail-desc">{{str_limit($msg->message_message, 10)}}</span>
                                                    <span class="time">{{$msg->created_at->diffForHumans()}}</span>
                                                </div>
                                            </a>
                                            @endforeach

                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all
                                                e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down search-box"> <a
                                class="nav-link hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item"
                                    href="index.html#"><i class="flag-icon flag-icon-in"></i> India</a> <a
                                    class="dropdown-item" href="index.html#"><i class="flag-icon flag-icon-fr"></i>
                                    French</a> <a class="dropdown-item" href="index.html#"><i
                                        class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item"
                                    href="index.html#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{asset('uploads/users')}}/{{Auth::user()->photo}}" style="height: 30px;" alt="user"
                                    class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img
                                            src="{{asset('uploads/users')}}/{{Auth::user()->photo}}" style="height: 75px;"
                                                    alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{Auth::user()->name}}</h4>
                                                <p class="text-muted">{{Auth::user()->email}}</p><a
                                                    href="pages-profile.html"
                                                    class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.html#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="index.html#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="index.html#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.html#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{asset('uploads/users')}}/{{Auth::user()->photo}}" style="width: 75px; height: 75px;"
                            alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5>{{Auth::user()->name}}</h5>
                        <a href="index.html#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i
                                class="mdi mdi-gmail"></i></a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class=""
                            data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="index.html#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <!-- text-->
                            <a href="index.html#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <!-- text-->
                            <a href="index.html#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="index.html#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">All personalization</li>
                        <li> <a class="waves-effect waves-dark" href="{{url('admin')}}" aria-expanded="false"><i class="fa fa-tachometer" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/user/add')? 'active':''}} {{Request::is('admin/user')? 'active':''}}"
                                href="#" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span
                                    class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/user')}}">All Users</a></li>
                                <li><a href="{{url('admin/user/add')}}">Add User</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-book" aria-hidden="true"></i><span class="hide-menu">Frontend</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/banner/add')? 'active':''}} {{Request::is('admin/banner')? 'active':''}}"
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Banners</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/banner')}}">All Banners</a></li>
                                        <li><a href="{{url('admin/banner/add')}}">Add Banner</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/desti-slider/add')? 'active':''}} {{Request::is('admin/desti-slider')? 'active':''}}"
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Destination Slider</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/desti-slider')}}">All Destination Slider</a></li>
                                        <li><a href="{{url('admin/desti-slider/add')}}">Add Destination Slider</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/choose-us/add')? 'active':''}} {{Request::is('admin/choose-us')? 'active':''}}"
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Why Choose Us</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/choose-us')}}">All Choose us</a></li>
                                        <li><a href="{{url('admin/choose-us/add')}}">Add Choose us</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/top-country/add')? 'active':''}} {{Request::is('admin/top-country')? 'active':''}}"
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Top Country To Visit</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/top-country')}}">All Top Country</a></li>
                                        <li><a href="{{url('admin/top-country/add')}}">Add Top Country</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/awesome-package/add')? 'active':''}} {{Request::is('admin/awesome-package')? 'active':''}}"
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Awesome Packages</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/awesome-package')}}">All Awesome Packages</a></li>
                                        <li><a href="{{url('admin/awesome-package/add')}}">Add Awesome Package</a></li>
                                    </ul>
                                </li>
                                <li> <a class="waves-effect waves-dark" href="{{url('admin/counter')}}"
                                        aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Counter</span></a></li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/gallery/add')? 'active':''}} {{Request::is('admin/gallery')? 'active':''}}"
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Galleries</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/gallery')}}">All Galleries</a></li>
                                        <li><a href="{{url('admin/gallery/add')}}">Add Gallery</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/testimonial')? 'active':''}} {{Request::is('admin/testimonial/add')? 'active':''}} "
                                        href="{{url('admin/testimonial')}}" aria-expanded="false"><i
                                            class="mdi mdi-bullseye"></i><span class="hide-menu">Tesitomials</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/testimonial')}}">All Tesitomials</a></li>
                                        <li><a href="{{url('admin/testimonial/add')}}">Add Tesitomial</a></li>
                                    </ul>
                                </li>
                                <li> <a class="waves-effect waves-dark" href="{{url('admin/conin')}}"
                                        aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Contact Information</span></a></li>
                                <li> <a class="waves-effect waves-dark" href="{{url('admin/about-content')}}"
                                        aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">About Content</span></a></li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/member')? 'active':''}}  {{Request::is('admin/member/add')? 'active':''}} "
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Members</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/member')}}">All Members</a></li>
                                        <li><a href="{{url('admin/member/add')}}">Add Member</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/tour/add')? 'active':''}} {{Request::is('admin/tour')? 'active':''}} "
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Tours</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/tour')}}">All Tours</a></li>
                                        <li><a href="{{url('admin/tour/add')}}">Add Tour</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/plan/add')? 'active':''}} {{Request::is('admin/plan')? 'active':''}} "
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Plans</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/plan')}}">All Plans</a></li>
                                        <li><a href="{{url('admin/plan/add')}}">Add Plan</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/blog-categorey/add')? 'active':''}} {{Request::is('admin/blog-categorey')? 'active':''}} {{Request::is('admin/blog/add')? 'active':''}} {{Request::is('admin/blog')? 'active':''}}"
                                        href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                                            class="hide-menu">Blogs</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('admin/blog')}}">All Blogs</a></li>
                                        <li><a href="{{url('admin/blog/add')}}">Add Blog</a></li>
                                        <li><a href="{{url('admin/blog-categorey')}}">All Blog Categorey</a></li>
                                        <li><a href="{{url('admin/blog-categorey/add')}}">Add Blog Categorey</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="{{url('admin/message')}}" aria-expanded="false"><i class="fa fa-comments" aria-hidden="true"></i><span class="hide-menu">Messages</span></a></li>
                        <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/service')? 'active':''}} {{Request::is('admin/service/add')? 'active':''}} {{Request::is('admin/location')? 'active':''}} {{Request::is('admin/location/add')? 'active':''}}"
                                href="#" aria-expanded="false"><i class="fa fa-car" aria-hidden="true"></i><span
                                    class="hide-menu">Services</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/service')}}">All Services</a></li>
                                <li><a href="{{url('admin/service/add')}}">Add Service</a></li>
                                <li><a href="{{url('admin/location')}}">All Location</a></li>
                                <li><a href="{{url('admin/location/add')}}">Add Location</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/service-package/flight')? 'active':''}} {{Request::is('admin/service-package/hotel')? 'active':''}} {{Request::is('admin/service-package/bus')? 'active':''}} {{Request::is('admin/service-package/add')? 'active':''}}"
                                href="#" aria-expanded="false"><i class="fa fa-gift"></i><span
                                    class="hide-menu">Service Packages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/service-package/flight')}}">All Flights</a></li>
                                <li><a href="{{url('admin/service-package/hotel')}}">All Hotels</a></li>
                                <li><a href="{{url('admin/service-package/bus')}}">All Buses</a></li>
                                <li><a href="{{url('admin/service-package/add')}}">Add Service Package</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark {{Request::is('admin/hotels')? 'active':''}} {{Request::is('admin/hotels/add')? 'active':''}} {{Request::is('admin/resturant')? 'active':''}} {{Request::is('admin/resturant/add')? 'active':''}}{{Request::is('admin/resturant-categorey')? 'active':''}} {{Request::is('admin/resturant-categorey/add')? 'active':''}} {{Request::is('admin/visitable')? 'active':''}}{{Request::is('admin/speciality')? 'active':''}}{{Request::is('admin/visitable/add')? 'active':''}}{{Request::is('admin/speciality/add')? 'active':''}}"
                                href="#" aria-expanded="false"><i class="fa fa-info-circle" aria-hidden="true"></i><span
                                    class="hide-menu">All Information</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/hotels')}}">All Hotels</a></li>
                                <li><a href="{{url('admin/hotels/add')}}">Add Hotels</a></li>
                                <li><a href="{{url('admin/resturant')}}">All Restaurant</a></li>
                                <li><a href="{{url('admin/resturant/add')}}">Add Restaurant</a></li>
                                <li><a href="{{url('admin/resturant-categorey')}}">All Restaurant Categorey</a></li>
                                <li><a href="{{url('admin/resturant-categorey/add')}}">Add Restaurant Categorey</a></li>
                                <li><a href="{{url('admin/visitable')}}">All Visitable Palce</a></li>
                                <li><a href="{{url('admin/visitable/add')}}">Add Visitable Palce</a></li>
                                <li><a href="{{url('admin/speciality')}}">All Specialities</a></li>
                                <li><a href="{{url('admin/speciality/add')}}">Add Specialities</a></li>
                            </ul>
                        </li>
                        <li> <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fa fa-power-off"></i>Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

        @yield('admin')
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2017 Admin Press Admin by HungryCoder </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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
