
@extends('layouts.website')
@section('website')
<!-- header area start -->
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
    <form action="{{url('cities/search')}}" method="get" class="searchform"
        style=" position: absolute; top: 70%; left: 50%; transform: translate(-50%, -70%); z-index: 99; width: 90%;">
        @csrf
        <div class="form-group">
            <input type="text" name="search" placeholder="Search Cities...." class="form-control"
                style=" height: 50px;">
        </div>
        <button type="submit" class="submit-btn"
            style=" position: absolute; right: 0; top: 0; height: 50px; width: 60px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><i
                class="fas fa-search"></i></button>
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
                                    @csrf
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
                                                        placeholder="dd/mm/yyy" name="depart" value="">
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
                                                        placeholder="dd/mm/yyy" name="return" value="">
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
                                    @csrf
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
                                                        placeholder="dd/mm/yyy" name="depart" value="">
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
                        <div class="tab-pane fade " id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="search-tab-content">
                                <!-- search content tab -->
                                <form action="{{url('buses/search')}}" method="get">
                                    @csrf
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
                                                        placeholder="dd/mm/yyy" name="depart" value="">
                                                </div>
                                            </div><!-- //. single item -->
                                        </li>
                                        <li>
                                            <div class="single-item date">
                                                <!-- single item -->
                                                <div class="form-group">
                                                    <label>Returning</label>
                                                    <input type="text" class="datepicker form-control"
                                                        placeholder="dd/mm/yyy" name="return" value="">
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
                </div>
                <!-- //. search inner -->
            </div>
        </div>
    </div>
</div>
<!-- search area end -->

<!-- hotels area start  -->
@if ($cities->hotels->count() !== 0)
<section class="find-tour-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title"><!-- section title -->
                    <h2 class="title"><span class="base-color">Find The</span> Perfect Hotel</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            @foreach ($cities->hotels as $search)

            <div class="col-lg-4 col-md-6">
                <div class="find-tour-item"><!-- find tour item -->
                    <div class="thumb">
                        <img src="{{asset('uploads/services/'.$search->hotelName->service_photo)}}" alt="hotels">
                    </div>
                    <div class="content">
                        <h4 class="title">{{$search->hotelName->service_name}}</h4>
                        <div class="price">
                            <div class="left">
                                <h6 style="font-size: 15px;">Type: <span class="price-tag">{{$search->hotel_star}}</span></h6>
                            </div>
                            <div class="right">
                                    <h6 style="font-size: 15px;">Food Available: <span class="price-tag">{{$search->hotel_food_status}}</span></h6>
                            </div>
                        </div>
                        <p>{{$search->hotel_details}}</p>
                        <div class="price">
                            <div class="left">
                                <span class="price-tag">${{$search->hotel_price}} /Night</span>
                            </div>
                            <div class="right">
                                <a href="{{url('hotel/'.$search->hotel_slug)}}" class="booknow">Read More</a>
                            </div>
                        </div>
                    </div>
                </div><!-- // find tour item -->
            </div>

            @endforeach
        </div>
    </div>
</section>

@endif
<!-- hotels area end -->

<!-- rsturant area start -->
@if ($cities->resturant->count() !== 0)

<section class="pakages-content-area gray-bg">
        <div class="container">
                <div class="section-title">
                        <!-- section title -->
                        <h2 class="title"><span class="base-color">Visitable</span> Places</h2>
                        <p>These are the specility's of this area arear </p>
                    </div>
            <div class="row">
                    @foreach ($cities->resturant as $search)

                <div class="col-lg-4 col-md-6">
                    <div class="single-pakages-item margin-bottom-30"><!-- single pakages item -->
                        <div class="thumb">
                            <img src="{{asset('uploads/resturants/'.$search->resturant_photo)}}" alt="resturant">
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="{{url('resturant/'.$search->resturant_slug)}}">{{$search->resturant_name}}</a></h4>
                            <h6 style="font-size: 15px;">Categorey: <span style="color: #777777; font-family: Roboto, sans-serif; font-weight: 400;">{{$search->categorey->cate_name}}</span></h6>
                            <h6 style="font-size: 15px;">Lowest Food price: <span style="color: #777777; font-family: Roboto, sans-serif; font-weight: 400;">{{$search->resturant_lowest_rate}}</span></h6>
                            <h6 style="font-size: 15px;">highest Food price: <span style="color: #777777; font-family: Roboto, sans-serif; font-weight: 400;">{{$search->resturant_highest_rate}}</span></h6>
                            <p>{{str_limit($search->resturant_details, 70)}}</p>
                            <div class="entry-footer">
                                <div class="location"><i class="fas fa-map-marker-alt"></i> {{$cities->from_name}}</div>
                                <div class="time"><i class="fas fa-location-arrow"></i> {{str_limit($search->resturant_address, 20)}}</div>
                                <div class="right a">
                                        <a href="{{url('resturant/'.$search->resturant_slug)}}" class="booknow">Book Now</a>
                                    </div>
                            </div>
                        </div>
                    </div><!-- //. single pakages item -->
                </div>

                @endforeach
            </div>
        </div>
</section>

@endif
    <!-- resturant area end -->

<!-- visitable places area start -->
@if ($cities->visitable->count() !== 0)

<section class="blog-page-content-area">
    <div class="container">
            <div class="section-title">
                    <!-- section title -->
                    <h2 class="title"><span class="base-color">Visitable</span> Places</h2>
                    <p>These are the specility's of this area arear </p>
                </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($cities->visitable as $search)

                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-grid-item">
                            <!-- single blog grid item -->
                            <div class="thumb">
                                <img src="{{asset('uploads/visitables/'.$search->visitable_photo)}}" alt="blog page">
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="{{url('visitable/'.$search->visitable_slug)}}">{{$search->visitable_name}}</a></h4>
                                <ul class="post-meta">
                                    <li><i class="fas fa-map-marker-alt"></i> {{$cities->from_name}}</li>
                                    <li><i class="fas fa-location-arrow"></i> {{str_limit($search->visitable_address, 25)}}</li>
                                </ul>
                                <p>{{str_limit($search->visitable_details, 70)}}</p>
                                <div class="right a">
                                        <a href="{{url('visitable/'.$search->visitable_slug)}}" class="booknow">Book Now</a>
                                    </div>
                            </div>
                        </div><!-- //. single blog grid item -->
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endif
<!-- visitable places area end -->

{{-- speciality search --}}

@if ($cities->speciality->count() !== 0)

<div class="destination-area gray-bg">
    <div class="container">
        <div class="section-title">
            <!-- section title -->
            <h2 class="title"><span class="base-color">Speci</span>ality's</h2>
            <p>These are the specility's of this area arear </p>
        </div>
        <div class="row">
            <!-- popular destinatino carousel -->

            @foreach ($cities->speciality as $search)
                <div class="col-lg-4 col-md-6">

                <div class="single-destination-item">
                    <!-- single destination item -->
                    <div class="thumb">
                        <img src="{{asset('uploads/specialitys/'.$search->speciality_photo)}}" alt="destination image">
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="{{url('speciality/'.$search->speciality_slug)}}">{{$search->speciality_name}}</a></h4>
                        <p>{{$search->speciality_details}}</p>
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i> {{$cities->from_name}}</li>
                        </ul>
                                        <div class="right a">
                                            <a href="{{url('speciality/'.$search->speciality_slug)}}" class="booknow">Book Now</a>
                                        </div>
                    </div>
                </div><!-- //. single destination item -->
            </div><!-- //. popular destination carousel -->

            @endforeach

        </div>
    </div>
</div>

@endif

{{-- speciality search --}}

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
