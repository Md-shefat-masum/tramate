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
                    <li class="breadcrumb-item active">Awesome Packages</li>
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
            <form method="post" action="{{url('admin/awesome-package/edit/update/'.$awesome->awesome_slug)}}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Awesome Package Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/awesome-package')}}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-th"></i>
                                All Awesome Packages</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_awesome_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_awesome_edit'))
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
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Awesome Package Title:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" value="{{$awesome->awesome_title}}">
                                @if ($errors->has('title'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('details')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Awesome Package Detail:</label>
                            <div class="col-sm-8">
                                <textarea name="details" id="" class="form-control"
                                    value="">{{$awesome->awesome_details}}</textarea>
                                @if ($errors->has('details'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('details') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('place')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Awesome Package Place:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="place"
                                    value="{{$awesome->awesome_place}}">
                                @if ($errors->has('place'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('place') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('date')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Awesome Package Date:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="date"
                                    value="{{$awesome->awesome_date}}">
                                @if ($errors->has('date'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Awesome Package Photo:</label>
                            <div class="col-sm-8">
                                <input type="file" name="photo">
                                <img src="{{asset('uploads/awesomes/'.$awesome->awesome_photo)}}" width="100"
                                    alt="awesome photo">
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
                    <button type="submit" class="btn btn-sm btn-info">UPDATE</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
