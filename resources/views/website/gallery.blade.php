@extends('layouts.website')
@section('website')
    
<!-- breadcrumb area start -->
<section class="breadcrumb-area extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                    <h1 class="title">Gallery</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Gallery</li>
                    </ul>
                </div><!-- //. breadcrumb inner -->
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- gallery content area start -->
<div class="gallery-content-area">
    <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="photo-gallery-masonry">
                            <div class="row">
                                @foreach ($all as $gallery)
                                    
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-photo-gallery grid-sizer"><!-- single photo gallery item -->
                                        <div class="thumb">
                                            <img src="{{asset('uploads/gallerys/'.$gallery->gallery_photo)}}" alt="photo gallery image">
                                            <div class="hover">
                                                <ul>
                                                    <li><i class="far fa-eye"></i> {{$gallery->gallery_views}}+ Views</li>
                                                    <li><i class="far fa-comments"></i> {{$gallery->gallery_comments}} Comments</li>
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
</div>
<!-- gallery content area end -->

@endsection