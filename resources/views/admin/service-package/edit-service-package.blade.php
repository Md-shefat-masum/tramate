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
            @if ($service2->service_type_id==1 || $service2->service_type_id==3)
        <form method="post" action="{{url('admin/service-package/edit/update/'.$service2->service_slug)}}" enctype="multipart/form-data">
            @endif
            @if ($service2->service_type_id==2)
        <form method="post" action="{{url('admin/service-package/edit/update2/'.$service2->service_slug)}}" enctype="multipart/form-data">
            @endif
            @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Service Package Information
                        </div>
                        <div class="col-md-4 header_button">
                                @if ($service2->service_type_id==1)
                                <a href="{{url('admin/service-package/flight')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i> All Filghts</a>
                                @endif
                                @if ($service2->service_type_id==2)
                                <a href="{{url('admin/service-package/hotel')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i> All Hotels</a>
                                @endif
                                @if ($service2->service_type_id==3)
                                <a href="{{url('admin/service-package/bus')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i> All Buses</a>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_service-package_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_service-package_edit'))
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
                                <label for="" class="col-sm-3 col-form-label cus_flabel">@if($service2->service_type_id==2)Hotel Location:@else Location From: @endif</label>
                                <div class="col-sm-8">
                                    <select name="from" class="form-control">
                                        <option value="">Select Location</option>
                                        @foreach ($from as $froms)

                                        <option value="{{$froms->from_id}}" {{Request::is($service2->from_id==$froms->from_id)? 'selected':''}}>{{$froms->from_name}}</option>

                                        @endforeach
                                    </select>
                                    @if ($errors->has('from'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if ($service2->service_type_id==1 || $service2->service_type_id==3)
                                
                            <div class="form-group row{{$errors->has('to')? ' has-error':''}}">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Location To:</label>
                                <div class="col-sm-8">
                                    <select name="to" class="form-control">
                                        <option value="">Select Location</option>
                                        @foreach ($to as $tos)

                                        <option value="{{$tos->to_id}}" {{Request::is($service2->to_id==$tos->to_id)? 'selected':''}}>{{$tos->to_name}}</option>

                                        @endforeach
                                    </select>
                                    @if ($errors->has('to'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            @endif
                            <div class="form-group row{{$errors->has('service')? ' has-error':''}}">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">@if($service2->service_type_id==1) Filght Companies @endif @if($service2->service_type_id==2) Hotels Name @endif @if($service2->service_type_id==3) Bus Companies @endif:</label>
                                <div class="col-sm-8">
                                    <select name="service" class="form-control">
                                        <option value="">@if($service2->service_type_id!==2) Select Company @else Select Hotel @endif</option>
                                        @foreach ($service as $services)
                                        @if ($service2->service_type_id==1)
                                        @if ($services->service_type_id==1)

                                        <option value="{{$services->service_id}}" {{Request::is($services->service_id==$service2->service_id)? 'selected':''}}>{{$services->service_name}}</option>

                                        @endif
                                        @endif

                                        @if ($service2->service_type_id==2)
                                        @if ($services->service_type_id==2)

                                        <option value="{{$services->service_id}}" {{Request::is($services->service_id==$service2->service_id)? 'selected':''}}>{{$services->service_name}}</option>

                                        @endif
                                        @endif

                                        @if ($service2->service_type_id==3)
                                        @if ($services->service_type_id==3)


                                        <option value="{{$services->service_id}}" {{Request::is($services->service_id==$service2->service_id)? 'selected':''}}>{{$services->service_name}}</option>

                                        @endif
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
                            @if ($service2->service_type_id!==2)

                            <div class="form-group row {{$errors->has('hours')? ' has-error':'' || $errors->has('minute')? ' has-error':'' || $errors->has('period')? ' has-error':''}}">
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

                            @endif
                            @if ($service2->service_type_id==2)
                            <div class="form-group row{{$errors->has('address')? ' has-error':''}}">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel Address:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="address"
                                        value="{{$service2->address}}">
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
                                        value="{{$service2->contact}}">
                                    @if ($errors->has('contact'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                                @endif
                                <div class="form-group row{{$errors->has('price')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">@if($service2->service_type_id!==2) Ticket Price @else Room Price @endif:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="price"
                                            value="{{$service2->price}}">
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
                    <button type="submit" class="btn btn-sm btn-info">SUBMIT</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
