@extends('layouts.website')
@section('website')
<!-- header area start -->
<div class="header-area">
    <div class="header-carousel">
        @foreach ($all as $data)

        <div class="single-carousel-item">
            <div class="slider-bg" style="background-image: url({{asset('uploads/banners/'.$data->ban_photo)}});"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="header-inner">
                            <!-- header inner -->
                            <div class="subwrap"><span class="subtitle">{{$data->ban_subtitle}}</span></div>
                            <h1 class="title">{{$data->ban_title}}</h1>
                            <p class=""> {{$data->ban_details}}</p>
                            <div class="btn-wrapper">
                                <!-- btn wrapper -->
                                <a href="{{$data->ban_url1}}" class="boxed-btn">{{$data->ban_btn1}}</a>
                                <a href="{{$data->ban_url2}}" class="boxed-btn blank">{{$data->ban_btn2}}</a>
                            </div><!-- //. btn wrapper -->
                        </div><!-- //. header inner -->
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    <div class="slider-progressbar"></div>
    <form action="{{url('cities/search')}}" method="get" class="searchform" style=" position: absolute; top: 70%; left: 50%; transform: translate(-50%, -70%); z-index: 99; width: 90%;">


        <div class="form-group">
            <input type="text" name="search" placeholder="Search Cities...." class="form-control" style=" height: 50px;">
        </div>
        <button type="submit" class="submit-btn" style=" position: absolute; right: 0; top: 0; height: 50px; width: 60px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><i class="fas fa-search"></i></button>
    </form>
</div>
<!-- header area end -->

<!-- search area start -->
<div class="search-area gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search-inner">
                    <!-- search inner -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true"><i class="fas fa-plane"></i> Flights</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false"><i class="fas fa-hotel"></i> Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false"><i class="fas fa-bus-alt"></i> buses</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="search-tab-content">
                                <!-- search content tab -->
                                <form action="{{url('flight/search')}}" method="get">
                                    <ul>
                                        <li>
                                            <div class="single-item select">
                                                <!-- single item -->
                                                <div class="form-group ">
                                                    <label>Flying from</label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="from">
                                                            @foreach ($from as $froms)

                                                            <option value="{{$froms->from_id}}">{{$froms->from_name}}
                                                            </option>

                                                            @endforeach
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item select">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="to">
                                                            @foreach ($to as $tos)

                                                            <option value="{{$tos->to_id}}">{{$tos->to_name}}</option>

                                                            @endforeach
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item date">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Departing</label>
                                                    <input type="text" class="datepicker form-control"
                                                        placeholder="dd/mm/yyy" name="depart" >
                                                    @if ($errors->has('depart'))
                                                    <span class="feedback mb-0" style="color: red;" role="alert">
                                                        <strong>{{ $errors->first('depart') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item date">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Returning</label>
                                                    <input type="text" class="datepicker form-control"
                                                        placeholder="dd/mm/yyy" name="return">
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item sits">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Adult</label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="adult">
                                                            @for ($i = 1; $i <= 5; $i++) <option value="{{$i}}">{{$i}}
                                                                </option>

                                                                @endfor
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item sits">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Child</label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="child">
                                                            @for ($i = 0; $i <= 5; $i++) <option value="{{$i}}">{{$i}}
                                                                </option>

                                                                @endfor
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item button">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <button class="submit-btn" type="submit">Search</button>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                    </ul>
                                </form>
                            </div><!-- //. search content tab -->
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="search-tab-content">
                                <!-- search content tab -->
                                <form action="{{url('hotel/search')}}" method="get">


                                    <ul class="ser">
                                        <li>
                                            <div class="single-item select">
                                                <!-- single item -->
                                                <div class="form-group ">
                                                    <label>Hotels from</label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="from">
                                                            @foreach ($from as $froms)

                                                            <option value="{{$froms->from_id}}">{{$froms->from_name}}
                                                            </option>

                                                            @endforeach
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item date">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Booking Date</label>
                                                    <input type="text" class="datepicker form-control"
                                                        placeholder="dd/mm/yyy" name="depart">
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item sits">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>No. Of Room(s)
                                                    </label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="rooms">
                                                            @for ($i = 1; $i <= 5; $i++) <option value="{{$i}}">{{$i}}
                                                                </option>

                                                                @endfor
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item sits">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Booking For</label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="days">
                                                            @for ($i = 1; $i <= 30; $i++) <option value="{{$i}}">{{$i}}
                                                                Day(s)
                                                                </option>

                                                                @endfor
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item button">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <button class="submit-btn" type="submit">Search</button>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                    </ul>
                                </form>
                            </div><!-- //. search content tab -->
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="search-tab-content">
                                <!-- search content tab -->
                                <form action="{{url('buses/search')}}" method="get">


                                    <ul class="ser">
                                        <li>
                                            <div class="single-item select">
                                                <!-- single item -->
                                                <div class="form-group ">
                                                    <label>Buses From</label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="from">
                                                            @foreach ($from as $froms)

                                                            <option value="{{$froms->from_id}}">{{$froms->from_name}}
                                                            </option>

                                                            @endforeach
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item select">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="to">
                                                            @foreach ($to as $tos)

                                                            <option value="{{$tos->to_id}}">{{$tos->to_name}}</option>

                                                            @endforeach
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item date">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Departing</label>
                                                    <input type="text" class="datepicker form-control"
                                                        placeholder="dd/mm/yyy" name="depart">
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item date">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Returning</label>
                                                    <input type="text" class="datepicker form-control"
                                                        placeholder="dd/mm/yyy" name="return">
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item sits">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Sit(s)</label>
                                                    <div class="has-icon">
                                                        <select class="form-control" name="sits">
                                                            @for ($i = 1; $i <= 5; $i++) <option value="{{$i}}">{{$i}}
                                                                </option>

                                                                @endfor
                                                        </select>
                                                        <div class="the-icon">
                                                            <i class="fas fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item button">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <button class="submit-btn" type="submit">Search</button>
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                    </ul>
                                </form>
                            </div><!-- //. search content tab -->
                        </div>
                    </div>
                </div><!-- //. search inner -->
            </div>
        </div>
    </div>
</div>
<!-- search area end -->

<!-- header bottom area start -->
<div class="destination-area gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="popular-destination-carousel">
                    <!-- popular destinatino carousel -->

                    @foreach ($desSlide as $slide)

                    <div class="single-destination-item">
                        <!-- single destination item -->
                        <div class="thumb">
                            <img src="{{asset('uploads/desti-sliders/'.$slide->slider_photo)}}" alt="destination image">
                            <div class="hover">
                                <ul class="meta">
                                    <li><i class="fas fa-user"></i> {{$slide->slider_visit}} +</li>
                                    <li><i class="fas fa-map-marker-alt"></i> {{$slide->categoryName->descate_name}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="#">{{$slide->slider_title}}</a></h4>
                            <p>{{$slide->slider_details}}</p>
                            <ul>
                                <li>${{$slide->slider_price}}</li>
                                <li><i class="fas fa-star-half-alt"></i> {{$slide->slider_rate}}
                                    {{$slide->slider_quality}}</li>
                            </ul>
                        </div>
                    </div><!-- //. single destination item -->

                    @endforeach

                </div><!-- //. popular destination carousel -->
            </div>
        </div>
    </div>
</div>
<!-- header bottom area end -->

<!-- why chose us area start -->
<section class="why-us-area ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <!-- section title -->
                    <h2 class="title"><span class="base-color">Why</span> Choose us</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row reorder-xs">
            @foreach ($choose as $us)

            <div class="col-lg-6">
                <div class="left-content-area">
                    <!-- left content area -->
                    <h4 class="title">{{$us->choose_title}}</h4>
                    <p>{{$us->choose_details}}</p>
                    <ul class="check-list margin-top-30">
                        <li><i class="fas fa-check"></i> {{$us->choose_li1}} </li>
                        <li><i class="fas fa-check"></i> {{$us->choose_li2}} </li>
                        <li><i class="fas fa-check"></i> {{$us->choose_li3}} </li>
                        <li><i class="fas fa-check"></i> {{$us->choose_li4}} </li>
                    </ul>
                    <div class="btn-wrapper">
                        <a href="{{$us->choose_url2}}" class="boxed-btn">{{$us->choose_btn2}}</a>
                    </div>
                </div><!-- //. left content area -->
            </div>
            <div class="col-lg-6">
                <div class="right-content-area">
                    <div class="img-wrapper">
                        <img src="{{asset('uploads/chooses/'.$us->choose_photo)}}" alt="why us image">
                        <div class="hover">
                            <a href="https://www.youtube.com/watch?v=GT6-H4BRyqQ" class="video-play-btn mfp-iframe"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
<!-- why chose us area end -->

<!-- top country to visit area start -->
<section class="top-country-area gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <!-- section title -->
                    <h2 class="title"><span class="base-color">Top Country</span> To Visit</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            @foreach ($country as $top)

            <div class="col-lg-4 col-md-6">
                <div class="single-top-country-item">
                    <!-- single top country item -->
                    <div class="thumb">
                        <img src="{{asset('uploads/countrys/'.$top->country_photo)}}" alt="top country ">
                    </div>
                    <div class="content">
                        <ul class="ratings">
                            <li>
                                @php
                                $x = 1;

                                while($x <= $top->country_rating) {
                                    echo '<i class="fas fa-star"></i>';
                                    $x++;
                                    }
                                    @endphp

                            </li>
                            <li>- {{$top->country_reviews}} Reviews</li>
                        </ul>
                        <h4 class="title"><a href="#">{{$top->country_name}}</a> <span
                                class="subtitle">{{$top->county_tour}} Night Tour</span></h4>
                    </div>
                </div><!-- //. single top country item -->
            </div>

            @endforeach
        </div>
    </div>
</section>
<!-- top country to visit area end -->

<!-- awesome pakages area start -->
<section class="awesome-pakages-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <!-- section title -->
                    <h2 class="title"><span class="base-color">Awesome</span> Package</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            @foreach ($awesome as $pac)

            <div class="col-lg-4 col-md-6">
                <div class="single-pakages-item">
                    <!-- single pakages item -->
                    <div class="thumb">
                        <img src="{{asset('uploads/awesomes/'.$pac->awesome_photo)}}" alt="awesome pakages">
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#">{{$pac->awesome_title}}</a></h4>
                        <p>{{$pac->awesome_details}}</p>
                        <div class="entry-footer">
                            <div class="location"><i class="fas fa-map-marker-alt"></i> {{$pac->awesome_place}}</div>
                            <div class="time"><i class="fas fa-calendar-alt"></i> {{$pac->awesome_date}}</div>
                        </div>
                    </div>
                </div><!-- //. single pakages item -->
            </div>

            @endforeach
        </div>
    </div>
</section>
<!-- awesome pakages area end -->

<!-- counterup area start -->
<section class="counterup-area counterup-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-counterup-item">
                    <!-- single counterup item -->
                    <div class="icon">
                        <i class="flaticon-happiness"></i>
                    </div>
                    <div class="content">
                        <span class="countnum">{{$counter->counter_tourist}}</span>
                        <h4 class="title">Happy Tourist</h4>
                    </div>
                </div><!-- //. single counterup item -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-counterup-item">
                    <!-- single counterup item -->
                    <div class="icon">
                        <i class="flaticon-rent-a-car"></i>
                    </div>
                    <div class="content">
                        <span class="countnum">{{$counter->counter_tour}}</span>
                        <h4 class="title">Great Tour</h4>
                    </div>
                </div><!-- //. single counterup item -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-counterup-item">
                    <!-- single counterup item -->
                    <div class="icon">
                        <i class="flaticon-tourist"></i>
                    </div>
                    <div class="content">
                        <span class="countnum">{{$counter->counter_guide}}</span>
                        <h4 class="title">Tourist Guide</h4>
                    </div>
                </div><!-- //. single counterup item -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-counterup-item">
                    <!-- single counterup item -->
                    <div class="icon">
                        <i class="flaticon-advertising"></i>
                    </div>
                    <div class="content">
                        <span class="countnum">{{$counter->counter_supported}}</span>
                        <h4 class="title">Hour Supported</h4>
                    </div>
                </div><!-- //. single counterup item -->
            </div>
        </div>
    </div>
</section>
<!-- counterup area end -->

<!-- photo gallery area start -->
<section class="photo-gallery-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <!-- section title -->
                    <h2 class="title"><span class="base-color">Photo</span> Gallery</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="photo-gallery-masonry">
                    <div class="row">
                        @foreach ($gallery as $gly)

                        <div class="col-lg-4 col-md-6">
                            <div class="single-photo-gallery grid-sizer">
                                <!-- single photo gallery item -->
                                <div class="thumb">
                                    <img src="{{asset('uploads/gallerys/'.$gly->gallery_photo)}}"
                                        alt="photo gallery image">
                                    <div class="hover">
                                        <ul>
                                            <li><i class="far fa-eye"></i> {{$gly->gallery_views}}+ Views</li>
                                            <li><i class="far fa-comments"></i> {{$gly->gallery_comments}} Comments</li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- //. single photo gallery item -->
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- photo gallery area end -->

<!-- testimonial area start -->
<section class="testimonial-area gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <!-- section title -->
                    <h2 class="title"><span class="base-color">Clients</span> Says</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-carousel">
                    <!-- testimonial carousel -->
                    @foreach ($testimonial as $testi)

                    <div class="single-testimonial-item">
                        <!-- single testimonial item -->
                        <div class="description">
                            <p>{{$testi->testi_descrip}} </p>
                        </div>
                        <div class="author-meta">
                            <div class="thumb">
                                <img src="{{asset('uploads/testimonials/'.$testi->testi_photo)}}" alt="">
                            </div>
                            <div class="content">
                                <h5 class="name">{{$testi->testi_name}}</h5>
                                <span class="post">{{$testi->testi_desig}}</span>
                            </div>
                        </div>
                    </div><!-- //. single testimonial item -->

                    @endforeach
                </div><!-- //. testimonial carousel -->
            </div>
        </div>
    </div>
</section>
<!-- testimonial area end -->

<!-- contact area start -->
<section class="contact-area contact-bg" id="cons">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <!-- section title -->
                    <h2 class="title"><span class="base-color">Get</span> In Touch</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info-area">
                    <h4 class="title">Tourism Company</h4>
                    <p>Advanced extended doubtful he he blessing together. Introduced far law gay considered frequently
                        entreaties difficulty. </p>
                    <ul class="contact-info-list">
                        <li><i class="fas fa-home"></i> Location : {{$conin->conin_location}}</li>
                        <li><i class="fas fa-phone"></i> Phone : {{$conin->conin_phone}}</li>
                        <li><i class="fas fa-fax"></i> Fax : {{$conin->conin_fax}}</li>
                        <li><i class="fas fa-envelope"></i> Email: {{$conin->conin_email}}</li>
                    </ul>
                    <ul class="social-icon">
                        <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#" class="behance"><i class="fab fa-behance"></i></a></li>
                        <li><a href="#" class="google-plus"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">

                @if(Session::has('success_message_send'))
                <script>
                    swal({
                        title: "Success!",
                        text: "User registration Success !",
                        icon: "success",
                        timer: 5000
                    });

                </script>
                @endif

                @if(Session::has('error_message_send'))
                <script>
                    swal({
                        title: "Opps!",
                        text: "Upload failed! Please try again.",
                        icon: "warning",
                        timer: 7000
                    });

                </script>
                @endif

                <div class="contact-form-content-area">
                    <form action="{{url('message/MES_20195d1b76fcd919e_CON_195d1b76fcd91a2')}}" method="post"
                        class="contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name"
                                value="{{old('name')}}">
                            @if ($errors->has('name'))
                            <span class="feedback mb-0" style="color: red;" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                value="{{old('email')}}">
                            @if ($errors->has('email'))
                            <span class="feedback mb-0" style="color: red;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group textarea">
                            <textarea cols="30" rows="5" class="form-control" name="message"
                                placeholder="Message">{{old('message')}}</textarea>
                            @if ($errors->has('message'))
                            <span class="feedback mb-0" style="color: red;" role="alert">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn-submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact area end -->
@endsection
