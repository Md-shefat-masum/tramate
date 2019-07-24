@extends('layouts.website')
@section('website')

<!-- breadcrumb area start -->
<section class="breadcrumb-area extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <!-- breadcrumb inner -->
                    <h1 class="title">Hotel Details</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Hotel Details</li>
                    </ul>
                </div><!-- //. breadcrumb inner -->
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- blog page content area start -->
<section class="blog-details-page-content-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="blog-details-content">
                    <div class="thumb">
                        <img src="{{asset('uploads/services/'.$hotel->hotelName->service_photo)}}" class="img-fluid m-auto d-block w-100" alt="hotel details image">
                    </div>
                    <h2 class="title">{{$hotel->hotelName->service_name}} </h2>
                    <div class="right">
                            <h6 style="font-size: 15px;">Hotel Type: <span class="price-tag">{{$hotel->hotel_star}}</span></h6>
                    </div>
                    <div class="right">
                            <h6 style="font-size: 15px;">Food Available: <span class="price-tag">{{$hotel->hotel_food_status}}</span></h6>
                    </div>
                    <div class="right">
                            <h6 style="font-size: 15px;">Room Price: <span class="price-tag">$ {{$hotel->hotel_price}} / Night</span></h6>
                    </div>
                    <div class="entry-content">
                        <p>{{$hotel->hotel_details}} </p>
                    </div>
                    <div class="post-meta">
                            <li><i class="fas fa-map-marker-alt"></i> {{$hotel->from->from_name}}</li>
                            <li><i class="fas fa-location-arrow"></i> {{$hotel->hotel_address}}</li>
                            <li><i class="fas fa-tty"></i> {{$hotel->hotel_contact}}</li>
                        </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- blog page content area end -->

@endsection
