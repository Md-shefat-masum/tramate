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
                <li class="breadcrumb-item active">Members</li>
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
            <form method="post" action="{{url('admin/member/add/upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Add Member Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/member')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i>
                                All Members</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_member_upload'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_member_upload'))
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
                        <div class="form-group row{{$errors->has('name')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Member Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('desig')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Member Designation:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="desig" value="{{old('desig')}}">
                                @if ($errors->has('desig'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('desig') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('url1')? ' has-error':''}}">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Social Media Url 1:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="url1" value="{{old('url1')}}">
                                    @if ($errors->has('url1'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('url1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row{{$errors->has('url2')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Social Media Url 2:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="url2" value="{{old('url2')}}">
                                        @if ($errors->has('url2'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('url2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('url3')? ' has-error':''}}">
                                        <label for="" class="col-sm-3 col-form-label cus_flabel">Social Media Url 3:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="url3" value="{{old('url3')}}">
                                            @if ($errors->has('url3'))
                                            <span class="invalid-feedback mb-0" role="alert">
                                                <strong>{{ $errors->first('url3') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row{{$errors->has('url4')? ' has-error':''}}">
                                            <label for="" class="col-sm-3 col-form-label cus_flabel">Social Media Url 4:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="url4" value="{{old('url4')}}">
                                                @if ($errors->has('url4'))
                                                <span class="invalid-feedback mb-0" role="alert">
                                                    <strong>{{ $errors->first('url4') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Member Photo:</label>
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
