@extends('layouts.website')
@section('website')
    
<!-- breadcrumb area start -->
<section class="breadcrumb-area extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                    <h1 class="title">Packages</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Packages</li>
                    </ul>
                </div><!-- //. breadcrumb inner -->
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- pakages content area start -->
<section class="pakages-content-area">
    <div class="container">
        <div class="row">
            @foreach ($awesome as $pac)
                
            <div class="col-lg-4 col-md-6">
                <div class="single-pakages-item margin-bottom-30"><!-- single pakages item -->
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
<!-- pakages content area end -->

<!-- testimonial area start -->
<section class="testimonial-area gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title"><!-- section title -->
                    <h2 class="title"><span class="base-color">Clients</span> Says</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-carousel"><!-- testimoinal carousel -->
                    <div class="single-testimonial-item"><!-- single testimonial item -->
                        <div class="description">
                            Gay prosperous impression had conviction. For every delay death ask style. Me mean able my by in they. Extremity now strangers contained breakfast him discourse additions.
                        </div>
                        <div class="author-meta">
                            <div class="thumb">
                                <img src="{{asset('contents/website')}}/assets/img/testimonial/01.jpg" alt="testimonial image">
                            </div>
                            <div class="content">
                                <h4 class="name">Aaron Robert</h4>
                                <span class="post">Installer</span>
                            </div>
                        </div>
                    </div><!-- //. single testimonial item -->
                    <div class="single-testimonial-item"><!-- single testimonial item -->
                        <div class="description">
                            Gay prosperous impression had conviction. For every delay death ask style. Me mean able my by in they. Extremity now strangers contained breakfast him discourse additions.
                        </div>
                        <div class="author-meta">
                            <div class="thumb">
                                <img src="{{asset('contents/website')}}/assets/img/testimonial/02.jpg" alt="testimonial image">
                            </div>
                            <div class="content">
                                <h4 class="name">Liam Forth</h4>
                                <span class="post">Responder</span>
                            </div>
                        </div>
                    </div><!-- //. single testimonial item -->
                    <div class="single-testimonial-item"><!-- single testimonial item -->
                        <div class="description">
                            Gay prosperous impression had conviction. For every delay death ask style. Me mean able my by in they. Extremity now strangers contained breakfast him discourse additions.
                        </div>
                        <div class="author-meta">
                            <div class="thumb">
                                <img src="{{asset('contents/website')}}/assets/img/testimonial/03.jpg" alt="testimonial image">
                            </div>
                            <div class="content">
                                <h4 class="name">Callum Watson</h4>
                                <span class="post">Developer</span>
                            </div>
                        </div>
                    </div><!-- //. single testimonial item -->
                    <div class="single-testimonial-item"><!-- single testimonial item -->
                        <div class="description">
                            Gay prosperous impression had conviction. For every delay death ask style. Me mean able my by in they. Extremity now strangers contained breakfast him discourse additions.
                        </div>
                        <div class="author-meta">
                            <div class="thumb">
                                <img src="{{asset('contents/website')}}/assets/img/testimonial/04.jpg" alt="testimonial image">
                            </div>
                            <div class="content">
                                <h4 class="name">Patrick Lawless</h4>
                                <span class="post">Processor</span>
                            </div>
                        </div>
                    </div><!-- //. single testimonial item -->
                </div><!-- //. testimonial carousel -->
            </div>
        </div>
    </div>
</section>
<!-- testimonial area end -->

<!-- brand carousel area start -->
<div class="brand-carousel-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-carousel">
                    <div class="single-brand-item"><!-- single brand item -->
                        <a href="#"><img src="{{asset('contents/website')}}/assets/img/brands/01.png" alt="brand images"></a>
                    </div><!-- //. single brand item -->
                    <div class="single-brand-item"><!-- single brand item -->
                        <a href="#"><img src="{{asset('contents/website')}}/assets/img/brands/02.png" alt="brand images"></a>
                    </div><!-- //. single brand item -->
                    <div class="single-brand-item"><!-- single brand item -->
                        <a href="#"><img src="{{asset('contents/website')}}/assets/img/brands/03.png" alt="brand images"></a>
                    </div><!-- //. single brand item -->
                    <div class="single-brand-item"><!-- single brand item -->
                        <a href="#"><img src="{{asset('contents/website')}}/assets/img/brands/04.png" alt="brand images"></a>
                    </div><!-- //. single brand item -->
                    <div class="single-brand-item"><!-- single brand item -->
                        <a href="#"><img src="{{asset('contents/website')}}/assets/img/brands/05.png" alt="brand images"></a>
                    </div><!-- //. single brand item -->
                    <div class="single-brand-item"><!-- single brand item -->
                        <a href="#"><img src="{{asset('contents/website')}}/assets/img/brands/06.png" alt="brand images"></a>
                    </div><!-- //. single brand item -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand carousel area end -->

@endsection