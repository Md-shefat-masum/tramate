@extends('layouts.website')
@section('website')

<!-- breadcrumb area start -->
<section class="breadcrumb-area extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <!-- breadcrumb inner -->
                    <h1 class="title">Blog Details</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Blog Details</li>
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
            <div class="col-lg-8">
                <div class="blog-details-content">
                    <div class="thumb">
                        <img src="{{asset('uploads/blogs/'.$blog->blog_photo)}}" alt="blog details image">
                    </div>
                    <h2 class="title">{{$blog->blog_title}} </h2>
                    <div class="post-meta">
                        <li><i class="fas fa-user"></i> {{$blog->roleName->role_name}}</li>
                        <li><i class="fas fa-calendar-alt"></i> {{$blog->created_at->format('d M Y')}}</li>
                    </div>
                    <div class="entry-content">
                        <p>{{$blog->blog_details}} </p>
                    </div>
                    <div class="entry-footer">
                        <div class="left-content">
                            <ul>
                                <li class="title">Tags:</li>
                                <li><a href="#">Event</a></li>
                                <li><a href="#">Gift</a></li>
                                <li><a href="#">Party</a></li>
                            </ul>
                        </div>
                        <div class="right-content">
                            <ul>
                                <li class="title">Share:</li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="entry-comment">

                        <h3 class="title">({{$blog->comment->count()}}) Comments</h3>
                        <ul class="comment-list">
                            @foreach ($blog->comment as $comment)

                            <li>
                                <div class="single-comment-item">
                                    <!-- single comment item -->
                                    <div class="thumb">
                                        <img src="{{asset('contents/website')}}/assets/img/comments/01.jpg"
                                            alt="comment image">
                                    </div>
                                    <div class="content">
                                        <a href="#" class="reply">Reply</a>
                                        <h4 class="name">{{$comment->comment_name}}</h4>
                                        <span class="time">{{$comment->created_at->diffForHumans()}}</span>
                                        <p>{{$comment->comment_comment}} </p>
                                    </div>
                                </div><!-- //. single comment item -->
                                <ul class="comment-list" style="margin: 40px 20px 60px;">
                                        <li>
                                                @foreach ($comment->reply as $reply)
                                                    
                                                <div class="single-comment-item reply" style="margin: 20px">
                                                    <!-- single comment item -->
                                                    <div class="thumb">
                                                        <img src="{{asset('contents/website')}}/assets/img/comments/02.jpg"
                                                            alt="comment image">
                                                    </div>
                                                    <div class="content">
                                                        <a href="#" class="reply">Reply</a>
                                                        <h4 class="name">{{$reply->reply_name}}</h4>
                                                        <span class="time">{{$reply->created_at->diffForHumans()}}</span>
                                                        <p>{{$reply->reply_reply}} </p>
                                                    </div>
                                                </div>
                                                
                                                @endforeach
                                                <div class="comment-form-area" style=" width: 70%; margin-left: auto;">
                                                    <h3 class="title">Reply</h3>
                                                    @if(Session::has('success_reply_send'))
                                                    <script>
                                                        swal({
                                                            title: "Success!",
                                                            text: "User registration Success !",
                                                            icon: "success",
                                                            timer: 5000
                                                        });
                
                                                    </script>
                                                    @endif
                
                                                    @if(Session::has('error_reply_send'))
                                                    <script>
                                                        swal({
                                                            title: "Opps!",
                                                            text: "Upload failed! Please try again.",
                                                            icon: "warning",
                                                            timer: 7000
                                                        });
                
                                                    </script>
                                                    @endif
                                                    <form action="{{url('blog-details/reply/f8a60736e5195d1'.$comment->comment_slug.'20195d1f8d1b70b')}}" method="POST"
                                                        class="comments-entry-form" style="text-align: right;">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name"
                                                                placeholder="Enter Your Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="email"
                                                                placeholder="Enter Your Email">
                                                        </div>
                                                        <div class="form-group textarea">
                                                            <textarea class="form-control" cols="30" rows="5" name="reply"
                                                                style="min-height: 60px; padding: 15px;"
                                                                placeholder="Enter Your Message"></textarea>
                                                        </div>
                                                        <button type="submit" style="height: 40px; width: 130px" class="submit-btn">Send
                                                            Message</button>
                                                    </form>
                                                </div>
                                                <!-- //. single comment item -->
                                            </li>
                                </ul>
                            </li>
                            

                            @endforeach
                        </ul>
                    </div>
                    @if(Session::has('success_comment_send'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_comment_send'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Upload failed! Please try again.",
                            icon: "warning",
                            timer: 7000
                        });

                    </script>
                    @endif
                    <div class="comment-form-area">
                        <h3 class="title">Leave A Comment</h3>
                        <form
                            action="{{url('blog-details/comment/f8a60736e5195d1'.$blog->blog_slug.'20195d1f8d1b70b')}}"
                            method="POST" class="comments-entry-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group textarea">
                                <textarea class="form-control" cols="30" rows="5" name="comment"
                                    placeholder="Enter Your Message"></textarea>
                            </div>
                            <button type="submit" class="submit-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <!-- widget area-->
                    <div class="widget widget_search">
                        <!-- widget -->
                        <div class="search-widget">
                            <form action="http://rexbd.net/html/tramate/tramate/blog.html" class="searchform">
                                <div class="form-group">
                                    <input type="text" placeholder="Search...." class="form-control">
                                </div>
                                <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div><!-- //. widget -->
                    <div class="widget widget_categories">
                        <!-- widget -->
                        <h4 class="widget-title">Category</h4>
                        <ul>
                            @foreach ($cate as $cate)

                            <li><a
                                    href="{{url('blog/195d1b80ba7be81_20196d5b27ba8be40'.$cate->cate_id.'20192d1b70ba9be58')}}">{{$cate->cate_name}}</a>
                            </li>

                            @endforeach
                            <li><a href="{{url('blog')}}">All</a></li>
                        </ul>
                    </div><!-- //. widget -->
                    <div class="widget widget_tag_cloud">
                        <!-- widget -->
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
