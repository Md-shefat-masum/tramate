@extends('layouts.website')
@section('website')

    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <!-- breadcrumb inner -->
                        <h1 class="title">404</h1>
                        <ul class="page-list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>404</li>
                        </ul>
                    </div><!-- //. breadcrumb inner -->
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- error page content area start -->
    <section class="error-page-content-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="error-page-content-inner">
                        <!-- error page content inner -->
                        <h4 class="title">Oops!. page not found.</h4>
                        <!-- <p>The page you are looking for does not exist.</p> -->
                        <div class="error-search">
                            <form action="{{url('cities/search')}}" method="POST" class="searchform">
                                <div class="form-group">
                                    <input type="text" placeholder="Search Cities...." class="form-control">
                                </div>
                                <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="btn-wrapper">
                            <a href="{{url('/')}}" class="boxed-btn">Go Back Home</a>
                        </div>
                    </div><!-- //. error page content inner -->
                </div>
            </div>
        </div>
        <div class="img-wrapper gray-bg">
            <img src="{{asset('contents/website')}}/assets/img/404.png" alt="error page image">
        </div>
    </section>
    <!-- error page content area end -->

@endsection