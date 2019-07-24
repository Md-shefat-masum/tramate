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
                    <li class="breadcrumb-item active">Service Packages</li>
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
            <div class="card-header bg-info">
                <div class="row">
                    <div class="col-md-8 header_text">
                        <i class="fa fa-bandcamp"></i> Add Service Package Information
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true"><i class="fa fa-plane"></i> Flights</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false"><i class="fa fa-hotel"></i> Hotels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false"><i class="fa fa-bus"></i> Buses</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="search-tab-content">
                        <!-- search content tab -->
                        <form method="post" action="{{url('admin/service-package/add/upload-flight')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @if(Session::has('success_flight_upload'))
                                <script>
                                    swal({
                                        title: "Success!",
                                        text: "User registration Success !",
                                        icon: "success",
                                        timer: 5000
                                    });

                                </script>
                                @endif

                                @if(Session::has('error_flight_upload'))
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
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Location From:</label>
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
                                <div class="form-group row{{$errors->has('to')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Location To:</label>
                                    <div class="col-sm-8">
                                        <select name="to" class="form-control">
                                            <option value="">Select Location</option>
                                            @foreach ($to as $tos)

                                            <option value="{{$tos->to_id}}">{{$tos->to_name}}</option>

                                            @endforeach
                                        </select>
                                        @if ($errors->has('to'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('to') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('service')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Flight Companies:</label>
                                    <div class="col-sm-8">
                                        <select name="service" class="form-control">
                                            <option value="">Select Company</option>
                                            @foreach ($service as $services)
                                            @if ($services->service_type_id==1)

                                            <option value="{{$services->service_id}}">{{$services->service_name}}</option>

                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('service'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('service') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div
                                    class="form-group row {{$errors->has('hours')? ' has-error':'' || $errors->has('minute')? ' has-error':'' || $errors->has('period')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Departing Time:</label>
                                    <div class="col-sm-8">
                                        <select name="hours" class="form-control" style="width: 10%;">
                                            <option value="">Hours</option>
                                            @for ($i = 1; $i <= 12; $i++) <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                        </select>
                                        <h4 style="display: inline-block; margin: 10px; font-weight: bold;">:</h4>
                                        <select name="minute" class="form-control" style="width: 10%;">
                                            <option value="">Minute</option>
                                            @for ($i = 1; $i <= 60; $i++) <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                        </select>

                                        <select name="period" class="form-control"
                                            style="width: 10%; margin-left: 10px;">
                                            <option value="">Period</option>
                                            <option value="am">AM</option>
                                            <option value="pm">PM</option>
                                        </select>
                                        <div style="display: block">
                                            @if ($errors->has('hours'))
                                            <span class="invalid-feedback mb-0" style="display: inline-block;"
                                                role="alert">
                                                <strong>{{ $errors->first('hours') }}</strong>
                                            </span>
                                            @endif
                                            @if ($errors->has('minute'))
                                            <span class="invalid-feedback mb-0" style="display: inline-block;"
                                                role="alert">
                                                <strong>{{ $errors->first('minute') }}</strong>
                                            </span>
                                            @endif
                                            @if ($errors->has('period'))
                                            <span class="invalid-feedback mb-0" style="display: inline-block;"
                                                role="alert">
                                                <strong>{{ $errors->first('period') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group row{{$errors->has('price')? ' has-error':''}}">
                                        <label for="" class="col-sm-3 col-form-label cus_flabel">Ticket Price:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="price"
                                                value="{{old('price')}}">
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
                                <button type="submit" class="btn btn-sm btn-info">REGISTRATION</button>
                            </div>
                        </form>
                    </div><!-- //. search content tab -->
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="search-tab-content">
                        <!-- search content tab -->
                        <form method="post" action="{{url('admin/service-package/add/upload-hotel')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @if(Session::has('success_hotel_upload'))
                                <script>
                                    swal({
                                        title: "Success!",
                                        text: "User registration Success !",
                                        icon: "success",
                                        timer: 5000
                                    });

                                </script>
                                @endif

                                @if(Session::has('error_hotel_upload'))
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
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel's Location:</label>
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

                                <div class="form-group row{{$errors->has('service')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Hotels Name:</label>
                                    <div class="col-sm-8">
                                        <select name="service" class="form-control">
                                            <option value="">Select Hotel</option>
                                            @foreach ($service as $services)
                                            @if ($services->service_type_id==2)

                                            <option value="{{$services->service_id}}">{{$services->service_name}}
                                            </option>

                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('service'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('service') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                    <div class="form-group row{{$errors->has('address')? ' has-error':''}}">
                                        <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel Address:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="address"
                                                value="{{old('address')}}">
                                            @if ($errors->has('address'))
                                            <span class="invalid-feedback mb-0" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="form-group row{{$errors->has('contact')? ' has-error':''}}">
                                        <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel Contact:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="contact"
                                                value="{{old('contact')}}">
                                            @if ($errors->has('contact'))
                                            <span class="invalid-feedback mb-0" role="alert">
                                                <strong>{{ $errors->first('contact') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row{{$errors->has('price')? ' has-error':''}}">
                                        <label for="" class="col-sm-3 col-form-label cus_flabel">Room Price:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="price"
                                                value="{{old('price')}}">
                                            @if ($errors->has('price'))
                                            <span class="invalid-feedback mb-0" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-sm btn-info">REGISTRATION</button>
                            </div>
                        </form>
                    </div><!-- //. search content tab -->
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="search-tab-content">
                        <!-- search content tab -->
                        <form method="post" action="{{url('admin/service-package/add/upload-bus')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @if(Session::has('success_bus_upload'))
                                <script>
                                    swal({
                                        title: "Success!",
                                        text: "User registration Success !",
                                        icon: "success",
                                        timer: 5000
                                    });

                                </script>
                                @endif

                                @if(Session::has('error_bus_upload'))
                                <script>
                                    swal({
                                        title: "Opps!",
                                        text: "Upload failed! Please try again.",
                                        icon: "warning",
                                        timer: 7000
                                    });

                                </script>
                                @endif
                                <div class="form-group row{{$errors->has('from')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Location From:</label>
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
                                <div class="form-group row{{$errors->has('to')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Location To:</label>
                                    <div class="col-sm-8">
                                        <select name="to" class="form-control">
                                            <option value="">Select Location</option>
                                            @foreach ($to as $tos)

                                            <option value="{{$tos->to_id}}">{{$tos->to_name}}</option>

                                            @endforeach
                                        </select>
                                        @if ($errors->has('to'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('to') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('service')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Bus Companies:</label>
                                    <div class="col-sm-8">
                                        <select name="service" class="form-control">
                                            <option value="">Select Company</option>
                                            @foreach ($service as $services)
                                            @if ($services->service_type_id==3)

                                            <option value="{{$services->service_id}}">{{$services->service_name}}
                                            </option>

                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('service'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('service') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div
                                    class="form-group row {{$errors->has('hours')? ' has-error':'' || $errors->has('minute')? ' has-error':'' || $errors->has('period')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Departing Time:</label>
                                    <div class="col-sm-8">
                                        <select name="hours" class="form-control" style="width: 10%;">
                                            <option value="">Hours</option>
                                            @for ($i = 1; $i <= 12; $i++) <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                        </select>
                                        <h4 style="display: inline-block; margin: 10px; font-weight: bold;">:</h4>
                                        <select name="minute" class="form-control" style="width: 10%;">
                                            <option value="">Minute</option>
                                            @for ($i = 1; $i <= 60; $i++) <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                        </select>

                                        <select name="period" class="form-control"
                                            style="width: 10%; margin-left: 10px;">
                                            <option value="">Period</option>
                                            <option value="am">AM</option>
                                            <option value="pm">PM</option>
                                        </select>
                                        <div style="display: block">
                                            @if ($errors->has('hours'))
                                            <span class="invalid-feedback mb-0" style="display: inline-block;"
                                                role="alert">
                                                <strong>{{ $errors->first('hours') }}</strong>
                                            </span>
                                            @endif
                                            @if ($errors->has('minute'))
                                            <span class="invalid-feedback mb-0" style="display: inline-block;"
                                                role="alert">
                                                <strong>{{ $errors->first('minute') }}</strong>
                                            </span>
                                            @endif
                                            @if ($errors->has('period'))
                                            <span class="invalid-feedback mb-0" style="display: inline-block;"
                                                role="alert">
                                                <strong>{{ $errors->first('period') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body cus_fbody">
                                    <div class="form-group row{{$errors->has('price')? ' has-error':''}}">
                                        <label for="" class="col-sm-3 col-form-label cus_flabel">Ticket Price:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="price"
                                                value="{{old('price')}}">
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
                                <button type="submit" class="btn btn-sm btn-info">REGISTRATION</button>
                            </div>
                        </form>
                    </div><!-- //. search content tab -->
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
