@extends('layouts.website')
@section('website')

<!-- breadcrumb area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                    <h1 class="title">Price Plan</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Price Plan</li>
                    </ul>
                </div><!-- //. breadcrumb inner -->
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- find tour area start  -->
<section class="find-tour-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title"><!-- section title -->
                    <h2 class="title"><span class="base-color">Find</span> Perfect Tour</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            @foreach ($tr as $tour)
                
            <div class="col-lg-4 col-md-6">
                <div class="find-tour-item"><!-- find tour item -->
                    <div class="thumb">
                        <img src="{{asset('uploads/tours/'.$tour->tour_photo)}}" alt="find tour item">
                    </div>
                    <div class="content">
                        <h4 class="title">{{$tour->tour_name}}</h4>
                        <div class="price">
                            <div class="left">
                                <span class="price-tag">${{$tour->tour_price}}</span><del>${{$tour->tour_oldprice}}</del>
                            </div>
                            <div class="right">
                                <a href="{{$tour->tour_url}}" class="booknow">{{$tour->tour_btn}}</a>
                            </div>
                        </div>
                    </div>
                </div><!-- // find tour item -->
            </div>
            
            @endforeach
        </div>
    </div>
</section>
<!-- find tour area end -->

<!-- price plan area start -->
<section class="price-plan-area gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title"><!-- section title -->
                    <h2 class="title"><span class="base-color">Tourist</span> Plans</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            @foreach ($pl as $plan)
                
            <div class="col-lg-4 col-md-6">
                <div class="single-price-plan-two margin-bottom-30"><!-- single price plan two -->
                    <div class="price-header">
                        <h4 class="name">{{$plan->plan_title}}</h4>
                        <div class="price">
                            <span class="sign">$</span>{{$plan->plan_price}}
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>{{$plan->plan_li1}}</li>
                                <li>{{$plan->plan_li2}}</li>
                                <li>{{$plan->plan_li3}}</li>
                                <li>{{$plan->plan_li4}}</li>
                                <li>{{$plan->plan_li5}}</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a href="{{$plan->plan_url}}" class="boxed-btn">{{$plan->plan_btn}}</a>
                        </div>
                    </div>
                </div><!-- //. single price plan two -->
            </div>
            
            @endforeach
        </div>
    </div>
</section>
<!-- price plan area end -->

@endsection