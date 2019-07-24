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
                    <li class="breadcrumb-item active">Restaurants</li>
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
            <form method="post" action="{{url('admin/resturant/add/upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Add Restaurant Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/resturant')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i>
                                All Restaurants</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_resturant_upload'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_resturant_upload'))
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
                        <div class="form-group row{{$errors->has('from')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Restaurant's Location:</label>
                            <div class="col-sm-8">
                                <select name="from" class="form-control">
                                    <option value="">Select Location</option>
                                    @foreach ($from as $froms)

                                    <option value="{{$froms->from_id}}">{{$froms->from_name}}</option>

                                    @endforeach
                                </select>
                                @if ($errors->has('from'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('from') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('name')? ' has-error':''}}">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Restaurant Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row{{$errors->has('details')? ' has-error':''}}">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Resturant Dtails:</label>
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
                        <div class="form-group row{{$errors->has('cate')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Restaurant Categorey:</label>
                            <div class="col-sm-8">
                                <select name="cate" class="form-control">
                                    <option value="">Restaurant Categorey</option>
                                    @foreach ($cate as $cates)
                                    <option value="{{$cates->cate_id}}">{{$cates->cate_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('cate'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('cate') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('lowest')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Lowest Food Price:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="lowest" value="{{old('lowest')}}">
                                @if ($errors->has('lowest'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('lowest') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('highest')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Highest Food Price:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="highest" value="{{old('highest')}}">
                                @if ($errors->has('highest'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('highest') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('address')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Restaurant Address:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="address" value="{{old('address')}}">
                                @if ($errors->has('address'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Photo:</label>
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
