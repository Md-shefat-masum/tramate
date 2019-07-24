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
                    <li class="breadcrumb-item active">Tours</li>
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
            <form method="post" action="{{url('admin/tour/edit/update/'.$tour->tour_slug)}}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Tour Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/tour')}}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-th"></i>
                                All Tours</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_tour_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_tour_edit'))
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
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Tour Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" value="{{$tour->tour_name}}">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('price')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Tour New Price:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="price" value="{{$tour->tour_price}}">
                                        @if ($errors->has('price'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('oldprice')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Tour Old Price:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="oldprice" value="{{$tour->tour_oldprice}}">
                                        @if ($errors->has('oldprice'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('oldprice') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('btn')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Button:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="btn" value="{{$tour->tour_btn}}">
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
                                        <input type="text" class="form-control" name="url" value="{{$tour->tour_url}}">
                                        @if ($errors->has('url'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('url') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Tour Photo:</label>
                            <div class="col-sm-8">
                                <input type="file" name="photo">
                                <img src="{{asset('uploads/tours/'.$tour->tour_photo)}}" width="100"
                                    alt="tour photo">
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
