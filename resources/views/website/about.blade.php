@extends('layouts.website')
@section('website')

    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <!-- breadcrumb inner -->
                        <h1 class="title">About</h1>
                        <ul class="page-list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>About</li>
                        </ul>
                    </div><!-- //. breadcrumb inner -->
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- about us page conent area start -->
    <section class="about-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content-area">
                        <!-- left content area -->
                        <div class="img-wrapper">
                            <img src="{{asset('uploads/about-contents/'.$abc->abc_photo)}}" alt="about left image">
                        </div>
                    </div><!-- left content area -->
                </div>
                <div class="col-lg-6">
                    <div class="right-content-area">
                        <!-- right content area -->
                        <h3 class="title">{{$abc->abc_title}}</h3>
                        <p>{{$abc->abc_details}} </p>

                    </div><!-- //. right content area -->
                </div>
            </div>
        </div>
    </section>
    <!-- about us page conent area end -->

    <!-- team member area start -->
    <section class="team-member-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <!-- section title -->
                        <h2 class="title"><span class="base-color">Awesome</span> Members</h2>
                        <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                            by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                    </div><!-- //. section title -->
                </div>
            </div>
            <div class="row">
                @foreach ($mem as $member)
                    
                <div class="col-lg-3 col-md-6">
                    <div class="single-team-member-item">
                        <!-- single team member item -->
                        <div class="thumb">
                            <img src="{{asset('uploads/members/'.$member->member_photo)}}" alt="team mameber image">
                        </div>
                        <div class="content">
                            <h4 class="title">{{$member->member_name}}</h4>
                            <span class="post">{{$member->member_desig}}</span>
                            <ul class="social-icon">
                                @if (!empty($member->member_url1) && $member->member_url1!=='#')
                                <li><a href="{{$member->member_url1}}"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if (!empty($member->member_url2) && $member->member_url2!=='#')
                                <li><a href="{{$member->member_url2}}"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if (!empty($member->member_url3) && $member->member_url3!=='#')
                                <li><a href="{{$member->member_url3}}"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                                @if (!empty($member->member_url4) && $member->member_url4!=='#')
                                <li><a href="{{$member->member_url4}}"><i class="fab fa-google-plus-g"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div><!-- //. single team member item -->
                </div>
                
                @endforeach
            </div>
        </div>
    </section>
    <!-- team member area end -->

    <!-- why chose us area start -->
    <section class="why-us-area">
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
                                <a href="{{$us->choose_url1}}" class="boxed-btn">{{$us->choose_btn1}}</a>
                            <a href="{{$us->choose_url2}}" class="boxed-btn">{{$us->choose_btn2}}</a>
                        </div>
                    </div><!-- //. left content area -->
                </div>
                <div class="col-lg-6">
                    <div class="right-content-area">
                        <div class="img-wrapper">
                                <img src="{{asset('uploads/chooses/'.$us->choose_photo)}}" alt="why us image">
                            <div class="hover">
                                <a href="https://www.youtube.com/watch?v=GT6-H4BRyqQ" class="video-play-btn mfp-iframe"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </section>
    <!-- why chose us area end -->

@endsection
