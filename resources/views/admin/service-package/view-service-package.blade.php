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
                        View User
                    </div>
                    <div class="col-md-4 header_button">
                            @if ($service->service_type_id==1)
                        <a href="{{url('admin/service-package/flight')}}" class="btn btn-sm btn-warning">All Flights</a>
                            @endif
                            @if ($service->service_type_id==2)
                        <a href="{{url('admin/service-package/hotel')}}" class="btn btn-sm btn-warning">All Hotels</a>
                            @endif
                            @if ($service->service_type_id==3)
                        <a href="{{url('admin/service-package/bus')}}" class="btn btn-sm btn-warning">All Buses</a>
                            @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped view_table">
                            <tr>
                                <td>@if($service->service_type_id==2)Hotel Location @else Location From @endif</td>
                                <td>:</td>
                                <td>{{$service->from->from_name}}</td>
                            </tr>
                            @if ($service->service_type_id!==2)
                            
                            <tr>
                                <td>Location To</td>
                                <td>:</td>
                                <td>{{$service->to->to_name}}</td>
                            </tr>

                            @endif

                            <tr>
                                <td>@if($service->service_type_id==1) Filght Company @endif @if($service->service_type_id==2) Hotel Name @endif @if($service->service_type_id==3) Bus Company @endif</td>
                                <td>:</td>
                                <td>{{$service->service->service_name}}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>:</td>
                                <td><img src="{{asset('uploads/services/'.$service->service->service_photo)}}" width="200" alt="service photo"></td>
                            </tr>
                            @if ($service->service_type_id!==2)
                            
                            <tr>
                                <td>Departing Time</td>
                                <td>:</td>
                                <td>{{$service->time}}</td>
                            </tr>

                            @endif
                            @if ($service->service_type_id==2)
                            
                            <tr>
                                <td>Hotel Address</td>
                                <td>:</td>
                                <td>{{$service->address}}</td>
                            </tr>

                            <tr>
                                <td>Hotel Contact</td>
                                <td>:</td>
                                <td>{{$service->contact}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>@if($service->service_type_id==2)Room Price @else Ticket Price @endif</td>
                                <td>:</td>
                                <td>{{$service->price}}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td>{{$service->created_at->format('D d M Y g:i:s A')}}</td>
                            </tr>
                        </table>
                    </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-sm btn-primary">Print</a>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
