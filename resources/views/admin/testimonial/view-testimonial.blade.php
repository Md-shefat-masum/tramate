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
                    <li class="breadcrumb-item active">Testimonials</li>
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
                        View Testimonial Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/testimonial')}}" class="btn btn-sm btn-warning">All Testimonials</a>
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
                                    <td>Client Name</td>
                                    <td>:</td>
                                    <td>{{$testi->testi_name}}</td>
                                </tr>
                                <tr>
                                    <td>Client Designation</td>
                                    <td>:</td>
                                    <td>{{$testi->testi_desig}}</td>
                                </tr>
                                <tr>
                                        <td>Client Description</td>
                                        <td>:</td>
                                        <td>{{$testi->testi_descrip}}</td>
                                    </tr>
                                    <tr>
                                        <td>Banner Photo</td>
                                        <td>:</td>
                                        <td><img src="{{asset('uploads/testimonials/'.$testi->testi_photo)}}" width="200" alt="testimonial photo"></td>
                                    </tr>
                                <tr>
                                    <td>Uploader</td>
                                    <td>:</td>
                                    <td>{{$testi->uploaderName->name}}</td>
                                </tr>
                                <tr>
                                    <td>Updator</td>
                                    <td>:</td>
                                    <td>
                                        @if (!empty($testi->testi_updator))
                                        
                                        {{$testi->updatorName->name}}</td>
                                    
                                        @endif
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>:</td>
                                    <td>{{$testi->created_at->format('D d M Y g:i:s A')}}</td>
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
