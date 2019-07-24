@extends('layouts.website')
@section('website')

<!-- breadcrumb area start -->
<section class="breadcrumb-area extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                    <h1 class="title">Blog</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div><!-- //. breadcrumb inner -->
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- blog page content area start -->
<section class="blog-page-content-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    @forelse ($blogs as $blog)

                    <div class="col-lg-6 col-md-6">
                        <div class="single-blog-grid-item"><!-- single blog grid item -->
                            <div class="thumb">
                                <img src="{{asset('uploads/blogs/'.$blog->blog_photo)}}" alt="blog page">
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="{{url('blog-details/'.$blog->blog_slug)}}">{{$blog->blog_title}}</a></h4>
                                <ul class="post-meta">
                                    <li><a href="{{url('blog/BLG_20195d1f8a134dc47'.$blog->blog_role_id.'195d1f8a134dc4c')}}"><i class="fas fa-user"></i> {{$blog->roleName->role_name}}</a></li>
                                    <li><a href="{{url('blog/BLG_20195d1f8a60736e5'.$blog->created_at->format('Y-m-d').'195d1f8a60736ea')}}"><i class="fas fa-calendar-alt"></i> {{$blog->created_at->format('d M Y')}}</a></li>
                                </ul>
                                <p>{{str_limit($blog->blog_details, 170)}}</p>
                                <a href="{{url('blog-details/'.$blog->blog_slug)}}" class="readmore">Read More</a>
                            </div>
                        </div><!-- //. single blog grid item -->
                    </div>
                    @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="single-blog-grid-item"><!-- single blog grid item -->
                            <div class="content">
                                <h4 class="title">No post found</h4>
                            </div>
                        </div><!-- //. single blog grid item -->
                    </div>
                    @endforelse
                    <div class="col-lg-12">
                        <div class="blog-pagination margin-top-30">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{$blogs->appends(['search' => request('search')])->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area"><!-- widget area-->
                    <div class="widget widget_search"><!-- widget -->
                        <div class="search-widget">


                            <form action="{{url('blog/search')}}" method="get" class="searchform">
                                <div class="form-group">
                                <input type="text" name="search" placeholder="Search...." class="form-control" value="{{request('search') ?? ''}}">
                                </div>
                                <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
                            </form>



                        </div>
                    </div><!-- //. widget -->
                    <div class="widget widget_categories"><!-- widget -->
                       <h4 class="widget-title">Category</h4>
                       <ul>
                           @foreach ($cate as $cate)

                           <li><a href="{{url('blog/195d1b80ba7be81_20196d5b27ba8be40'.$cate->cate_id.'20192d1b70ba9be58')}}">{{$cate->cate_name}}</a></li>

                           @endforeach
                           <li><a href="{{url('blog')}}">All</a></li>
                       </ul>
                    </div><!-- //. widget -->
                    <div class="widget widget_tag_cloud"><!-- widget -->
                       <h4 class="widget-title">Tag</h4>
                       <div class="tagcloud">
                           <a href="#">Event</a>
                           <a href="#">First Metting</a>
                           <a href="#">Gift</a>
                           <a href="#">Love</a>
                           <a href="#">Party</a>
                           <a href="#">Story</a>
                           <a href="#">Wedding</a>
                       </div>
                    </div><!-- //. widget -->
                </div><!-- //. widget area -->
            </div>
        </div>
    </div>

</section>
<!-- blog page content area end -->

@endsection
