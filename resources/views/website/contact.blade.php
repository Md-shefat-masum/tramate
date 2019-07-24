@extends('layouts.website')
@section('website')

<!-- breadcrumb area start -->
<section class="breadcrumb-area extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <!-- breadcrumb inner -->
                    <h1 class="title">Contact</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div><!-- //. breadcrumb inner -->
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- contact page content area start -->
<section class="conteact-page-content-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <!-- section title -->
                    <h2 class="title"><span class="base-color">Get</span> In Touch</h2>
                    <p>Expenses as material breeding insisted building to in. Continual so distrusts pronounce
                        by unwilling listening. Thing do taste on we manor. Him had wound.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-form-outer">
                        @if(Session::has('success_message_send'))
                        <script>
                            swal({
                                title: "Success!",
                                text: "User registration Success !",
                                icon: "success",
                                timer: 5000
                            });
                
                        </script>
                        @endif
                
                        @if(Session::has('error_message_send'))
                        <script>
                            swal({
                                title: "Opps!",
                                text: "Upload failed! Please try again.",
                                icon: "warning",
                                timer: 7000
                            });
                
                        </script>
                        @endif
                    <!-- contact form outer -->
                    <form action="{{url('contact/message/CON_195d1b80ba7be81_MES_20195d1b80ba7be85')}}"
                        id="get_in_touch" method="POST"  class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="first_name" name="f_name" class="form-control"
                                        placeholder="First Name">
                                    @if ($errors->has('f_name'))
                                    <span class="feedback mb-0" style="color: red;" role="alert">
                                        <strong>{{ $errors->first('f_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" id="email" class="form-control" name="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="feedback mb-0" style="color: red;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="last_name" class="form-control" name="l_name"
                                        placeholder="Last Name">
                                        @if ($errors->has('l_name'))
                                    <span class="feedback mb-0" style="color: red;" role="alert">
                                        <strong>{{ $errors->first('l_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" id="subject" class="form-control" name="subject"
                                        placeholder="Subject">
                                        @if ($errors->has('subject'))
                                    <span class="feedback mb-0" style="color: red;" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group textarea">
                                    <textarea class="form-control" id="message" cols="30" name="message"
                                        placeholder="Enter Your Message" rows="5"></textarea>
                                        @if ($errors->has('message'))
                                    <span class="feedback mb-0" style="color: red;" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button class="submit-btn" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div><!-- //. contact form outer -->
            </div>
        </div>
    </div>
</section>
<!-- contact page content area end -->

<div class="map-marker">
    <div id="map"></div>
</div>


@endsection
