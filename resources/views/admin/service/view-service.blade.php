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
            <div class="card-header bg-info">
                <div class="row">
                    <div class="col-md-8 header_text">
                        View Service Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/service')}}" class="btn btn-sm btn-warning">All Service</a>
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
                                <td>Service Name</td>
                                <td>:</td>
                                <td>{{$service->service_name}}</td>
                            </tr>
                            <tr>
                                <td>Service Type</td>
                                <td>:</td>
                                <td>{{$service->serviceType->service_type_name}}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>:</td>
                                <td><img src="{{asset('uploads/services/'.$service->service_photo)}}" width="200" alt="service photo"></td>
                            </tr>
                            <tr>
                                <td>Creator</td>
                                <td>:</td>
                                <td>{{$service->uploaderName->name}}</td>
                            </tr>
                            <tr>
                                <td>Updator</td>
                                <td>:</td>
                                <td>
                                    @if (!empty($service->service_updator))
                                
                                    {{$service->updatorName->name}}
                                
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td>{{$service->created_at->format('D d M Y g:i:s A')}}}}</td>
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
