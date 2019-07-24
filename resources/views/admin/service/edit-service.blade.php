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
                    <li class="breadcrumb-item active">Services</li>
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
            <form method="post" action="{{url('admin/service/edit/update/'.$service->service_slug)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Service Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/service')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i> All Services</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_service_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_service_edit'))
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
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Service Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{$service->service_name}}">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('type')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Service Type:</label>
                            <div class="col-sm-8">
                                <select name="type" class="form-control">
                                    <option value="">Select Service Type</option>
                                    @foreach ($type as $data)
                                        
                                    <option value="{{$data->service_type_id}}" {{Request::is($data->service_type_id==$service->service_type_id)? 'selected':''}}>{{$data->service_type_name}}</option>
                                    
                                    @endforeach
                                </select>
                                @if ($errors->has('type'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Photo:</label>
                            <div class="col-sm-5">
                                <input type="file" name="photo">
                                <img src="{{asset('uploads/services/'.$service->service_photo)}}" width="100" alt="service photo">
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
                    <button type="submit" class="btn btn-sm btn-info">SUBMIT</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
