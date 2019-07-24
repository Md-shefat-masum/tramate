@extends('layouts.website')
@section('website')

    <!-- breadcrumb area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <!-- breadcrumb inner -->
                        <h1 class="title">Team</h1>
                        <ul class="page-list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Team</li>
                        </ul>
                    </div><!-- //. breadcrumb inner -->
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- team content area start -->
    <section class="team-content-area">
        <div class="container">
            <div class="row">
                @foreach ($all as $member)
                    
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
    <!-- team content area end -->
    
@endsection