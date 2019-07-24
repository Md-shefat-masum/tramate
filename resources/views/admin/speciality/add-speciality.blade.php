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
                <li class="breadcrumb-item active">Specialities</li>
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
            <form method="post" action="{{url('admin/speciality/add/upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Add Speciality Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/speciality')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i>
                                All Specialities</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_speciality_upload'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_speciality_upload'))
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
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Speciality's Location:</label>
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
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Speciality:</label>
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
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Speciality Dtails:</label>
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
