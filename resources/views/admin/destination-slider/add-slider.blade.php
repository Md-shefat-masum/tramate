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
                    <li class="breadcrumb-item active">Destination Sliders</li>
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
            <form method="post" action="{{url('admin/desti-slider/add/upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Add Destination Slider Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/desti-slider')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i>
                                All Destination Sliders</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_slider_upload'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_slider_upload'))
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
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Destination Slider title:</label>
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
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Destination Slider Detail:</label>
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
                        <div class="form-group row{{$errors->has('price')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Destination Slider Price:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="price"
                                    value="{{old('price')}}">
                                @if ($errors->has('price'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('rate')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Destination Slider Rate:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="rate"
                                    value="{{old('rate')}}">
                                @if ($errors->has('rate'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('rate') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('quality')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Destination Slider Quality:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="quality"
                                    value="{{old('quality')}}">
                                @if ($errors->has('quality'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('quality') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('visit')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Destination Slider Visti:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="visit"
                                    value="{{old('visit')}}">
                                @if ($errors->has('visit'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('visit') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('category')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Destination Slider Category:</label>
                            <div class="col-sm-8">
                                <select name="category" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($category as $data)
                                        
                                    <option value="{{$data->descate_id}}">{{$data->descate_name}}</option>
                                    
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Destination Slider Photo:</label>
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
