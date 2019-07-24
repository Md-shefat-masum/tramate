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
                    <li class="breadcrumb-item active">Banners</li>
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
            <form method="post" action="{{url('admin/banner/add/upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Add Banner Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/banner')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i>
                                All Banners</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_banner_upload'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_banner_upload'))
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
                        <div class="form-group row{{$errors->has('subtitle')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Banner Subtitle:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="subtitle" value="{{old('subtitle')}}">
                                @if ($errors->has('subtitle'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('subtitle') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('title')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Banner title:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                @if ($errors->has('title'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('details')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Banner Detail:</label>
                            <div class="col-sm-8">
                                <textarea name="details" id="" class="form-control"
                                    value="">{{old('details')}}</textarea>
                                @if ($errors->has('details'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('details') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('btn1')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Button 1:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="btn1"
                                    value="{{old('btn1')}}">
                                @if ($errors->has('btn1'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('btn1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('url1')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Button Url 1:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="url1"
                                    value="{{old('url1')}}">
                                @if ($errors->has('url1'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('url1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('btn2')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Button 2:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="btn2"
                                    value="{{old('btn2')}}">
                                @if ($errors->has('btn2'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('btn2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('url2')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Button Url 2:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="url2"
                                    value="{{old('url2')}}">
                                @if ($errors->has('url2'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('url2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Banner Photo:</label>
                            <div class="col-sm-8">
                                <input type="file" name="photo">
                                @if ($errors->has('photo'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-info">UPLOAD</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
