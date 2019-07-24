@extends('layouts.website')
@section('website')

<!-- breadcrumb area start -->
<section class="breadcrumb-area extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <!-- breadcrumb inner -->
                    <h1 class="title">Resturant Details</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Resturant Details</li>
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
                        <img src="{{asset('uploads/resturants/'.$resturant->resturant_photo)}}" class="img-fluid m-auto d-block w-100" alt="resturant details image">
                    </div>
                    <h2 class="title">{{$resturant->resturant_name}} </h2>
                    <div class="right">
                            <h6 style="font-size: 15px;">Resturant Categorey: <span class="price-tag">{{$resturant->categorey->cate_name}}</span></h6>
                    </div>
                    <div class="right">
                            <h6 style="font-size: 15px;">Lowest Food Price: <span class="price-tag">{{$resturant->resturant_lowest_rate}}</span></h6>
                    </div>
                    <div class="right">
                            <h6 style="font-size: 15px;">Highest Food Price: <span class="price-tag">{{$resturant->resturant_highest_rate}}</span></h6>
                    </div>
                    <div class="entry-content">
                        <p>{{$resturant->resturant_details}} </p>
                    </div>
                    <div class="post-meta">
                            <li><i class="fas fa-map-marker-alt"></i> {{$resturant->from->from_name}}</li>
                            <li><i class="fas fa-location-arrow"></i> {{$resturant->resturant_address}}</li>
                        </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- blog page content area end -->

@endsection
