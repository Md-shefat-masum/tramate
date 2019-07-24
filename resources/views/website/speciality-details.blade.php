@extends('layouts.website')
@section('website')

<!-- breadcrumb area start -->
<section class="breadcrumb-area extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <!-- breadcrumb inner -->
                    <h1 class="title">Speciality Details</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Speciality Details</li>
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
                        <img src="{{asset('uploads/specialitys/'.$speciality->speciality_photo)}}" class="img-fluid m-auto d-block w-100" alt="speciality details image">
                    </div>
                    <h2 class="title">{{$speciality->speciality_name}} </h2>
                    <div class="entry-content">
                        <p>{{$speciality->speciality_details}} </p>
                    </div>
                    <div class="post-meta">
                            <li><i class="fas fa-map-marker-alt"></i> {{$speciality->from->from_name}}</li>
                        </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- blog page content area end -->

@endsection
