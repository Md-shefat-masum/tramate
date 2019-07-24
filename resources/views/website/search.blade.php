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
    <form action="{{url('cities/search')}}" method="get" class="searchform"
        style=" position: absolute; top: 70%; left: 50%; transform: translate(-50%, -70%); z-index: 99; width: 90%;">

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
                                    <a class="nav-link {{Request::is('flight/search')? 'active':''}}" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true"><i class="fas fa-plane"></i> Flights</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Request::is('hotel/search')? 'active':''}}" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false"><i class="fas fa-hotel"></i> Hotels</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Request::is('buses/search')? 'active':''}}" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false"><i class="fas fa-bus-alt"></i> buses</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show {{Request::is('flight/search')? 'show active':''}}" id="home" role="tabpanel" aria-labelledby="home-tab">
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

                                                                    <option value="{{$froms->from_id}}" {{Request::is($frome==$froms->from_id)? 'selected':''}}>{{$froms->from_name}}
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

                                                                    <option value="{{$tos->to_id}}" {{Request::is($toe==$tos->to_id)? 'selected':''}}>{{$tos->to_name}}</option>

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
                                                                placeholder="dd/mm/yyy" name="depart" value="{{request('search') ?? ''}}">
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
                                                                placeholder="dd/mm/yyy" name="return" value="{{$return}}">
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
                                                                    @for ($i = 1; $i <= 5; $i++) <option value="{{$i}}" {{Request::is($adult==$i)? 'selected':''}}>{{$i}}
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
                                                                    @for ($i = 0; $i <= 5; $i++) <option value="{{$i}}" {{Request::is($child==$i)? 'selected':''}}>{{$i}}
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
                                <div class="tab-pane fade {{Request::is('hotel/search')? 'show active':''}}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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

                                                                    <option value="{{$froms->from_id}}" {{Request::is($frome==$froms->from_id)? 'selected':''}}>{{$froms->from_name}}
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
                                                                placeholder="dd/mm/yyy" name="depart" value="{{$depart}}" >
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
                                                                    @for ($i = 1; $i <= 5; $i++) <option value="{{$i}}" {{Request::is($rooms==$i)? 'selected':''}}>{{$i}}
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
                                                                    @for ($i = 1; $i <= 30; $i++) <option value="{{$i}}" {{Request::is($days==$i)? 'selected':''}}>{{$i}} Day(s)
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
                                <div class="tab-pane fade {{Request::is('buses/search')? 'show active':''}}" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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

                                                                    <option value="{{$froms->from_id}}" {{Request::is($frome==$froms->from_id)? 'selected':''}}>{{$froms->from_name}}
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

                                                                    <option value="{{$tos->to_id}}" {{Request::is($toe==$tos->to_id)? 'selected':''}}>{{$tos->to_name}}</option>

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
                                                                placeholder="dd/mm/yyy" name="depart" value="{{$depart}}">
                                                        </div>
                                                    </div><!-- //. single item -->
                                                </li>
                                                <li>
                                                    <div class="single-item date">
                                                        <!-- single item -->
                                                        <div class="form-group">
                                                            <label>Returning</label>
                                                            <input type="text" class="datepicker form-control"
                                                                placeholder="dd/mm/yyy" name="return" value="{{$return}}">
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
                                                                    @for ($i = 1; $i <= 5; $i++) <option value="{{$i}}" {{Request::is($sits==$i)? 'selected':''}}>{{$i}}
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

<div class="destination-area gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped all_view_table" id="table_id">
                                <thead class="thead-dark">

                                    <tr class="text-center">
                                        @php
                                            foreach ($searches as $search) {
                                                $search= $search->service_type_id;
                                            }
                                        @endphp
                                        @if ($search==1)

                                        <th scope="col">Flights Logos</th>
                                        <th scope="col">Flights From</th>
                                        <th scope="col">Flights To</th>
                                        <th scope="col">Flight Companies </th>
                                        <th scope="col">Departing Date</th>
                                        <th scope="col">Returning Date </th>
                                        <th scope="col">Departing Time</th>
                                        <th scope="col">Adult Sit(s)</th>
                                        <th scope="col">Child Sit(s)</th>
                                        <th scope="col">Single Ticket Price</th>
                                        <th scope="col">Total Ticket Price</th>

                                        @endif
                                        @if ($search==2)

                                        <th scope="col">Hotels Photos</th>
                                        <th scope="col">Hotels Location</th>
                                        <th scope="col">Hotels Name</th>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">Room(s) Booked</th>
                                        <th scope="col">Booked For</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Contact</th>

                                        @endif
                                        @if ($search==3)

                                        <th scope="col">Buses photos</th>
                                        <th scope="col">Buses from</th>
                                        <th scope="col">Buses to</th>
                                        <th scope="col">Bus Companies </th>
                                        <th scope="col">Departing Date</th>
                                        <th scope="col">Returning Date </th>
                                        <th scope="col">Departing Time</th>
                                        <th scope="col">Sit(s)</th>
                                        <th scope="col">Single Ticket Price</th>
                                        <th scope="col">Total Ticket Price</th>

                                        @endif
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($searches as $search)

                                    <tr class="text-center">
                                        <td><img src="{{asset('uploads/services/'.$search->service->service_photo)}}"
                                                width="80" alt="logo"></td>
                                        <td>{{$search->from->from_name}}</td>
                                        @if ($search->service_type_id!==2)

                                        <td>{{$search->to->to_name}}</td>

                                        @endif
                                        <td>{{$search->service->service_name}}</td>

                                        <td>{{$depart}}</td>

                                        @if ($search->service_type_id!==2)
                                            @if (!empty($return))

                                            <td>{{$return}}</td>

                                            @else

                                            <td>Without Returning Ticket</td>

                                            @endif

                                        @endif

                                        @if ($search->service_type_id!==2)

                                        <td>{{$search->time}}</td>

                                        @endif

                                        @if ($search->service_type_id==1)

                                        <td>{{$adult}}</td>

                                        @endif
                                        @if ($search->service_type_id==1)

                                        <td>{{$child}}</td>

                                        @endif

                                        @if ($search->service_type_id==1)

                                        <td>${{$search->price}}</td>

                                        @endif

                                        @if ($search->service_type_id==1)

                                        @if (!empty($return))

                                        <td>${{(($search->price*$adult)+($search->price*$child*0.5))*2}}</td>

                                        @else

                                        <td>${{($search->price*$adult)+($search->price*$child*0.5)}}</td>

                                        @endif

                                        @endif

                                        @if ($search->service_type_id==2)

                                        <td>{{$rooms}}</td>

                                        @endif

                                        @if ($search->service_type_id==2)

                                        <td>{{$days}} Day(s)</td>

                                        @endif

                                        @if ($search->service_type_id==2)

                                        <td>${{($search->price*$rooms)*$days}}</td>

                                        @endif

                                        @if ($search->service_type_id==2)

                                        <td>{{$search->address}}</td>

                                        @endif

                                        @if ($search->service_type_id==2)

                                        <td>{{$search->contact}}</td>

                                        @endif

                                        @if ($search->service_type_id==3)

                                        <td>{{$sits}}</td>

                                        @endif

                                        @if ($search->service_type_id==3)

                                        <td>${{$search->price}}</td>

                                        @endif

                                        @if ($search->service_type_id==3)

                                        @if (!empty($return))

                                        <td>${{($search->price*$sits)*2}}</td>

                                        @else

                                        <td>${{$search->price*$sits}}</td>

                                        @endif

                                        @endif
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <form action="{{url('message/MES_20195d1b76fcd919e_CON_195d1b76fcd91a2')}}" method="get"
                        class="contact-form">

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
