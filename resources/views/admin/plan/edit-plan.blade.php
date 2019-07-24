@extends('layouts.admin')
@section('admin')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Plans</li>
                </ol>
            </div>
        </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="card">
            <form method="post" action="{{url('admin/plan/edit/update/'.$plan->plan_slug)}}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Plan Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/plan')}}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-th"></i>
                                All Plans</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_plan_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_plan_edit'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Upload failed! Please try again.",
                            icon: "warning",
                            timer: 7000
                        });

                    </script>
                    @endif
                    <div class="form-body cus_fbody">
                            <div class="form-group row{{$errors->has('title')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Plan Title:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="title" value="{{$plan->plan_title}}">
                                        @if ($errors->has('title'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('li1')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Plan List No.1:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="li1" value="{{$plan->plan_li1}}">
                                        @if ($errors->has('li1'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('li1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('li2')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Plan List No.2:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="li2" value="{{$plan->plan_li2}}">
                                        @if ($errors->has('li2'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('li2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('li3')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Plan List No.3:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="li3" value="{{$plan->plan_li3}}">
                                        @if ($errors->has('li3'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('li3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('li4')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Plan List No.4:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="li4" value="{{$plan->plan_li4}}">
                                        @if ($errors->has('li4'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('li4') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('li5')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Plan List No.5:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="li5" value="{{$plan->plan_li5}}">
                                        @if ($errors->has('li5'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('li5') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('btn')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Button:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="btn" value="{{$plan->plan_btn}}">
                                        @if ($errors->has('btn'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('btn') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('url')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Button Url:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="url" value="{{$plan->plan_url}}">
                                        @if ($errors->has('url'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('url') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('price')? ' has-error':''}}">
                                        <label for="" class="col-sm-3 col-form-label cus_flabel">Plan Price:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="price" value="{{$plan->plan_price}}">
                                            @if ($errors->has('price'))
                                            <span class="invalid-feedback mb-0" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-info">UPDATE</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
