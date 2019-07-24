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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
                        View Testimonial
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/message')}}" class="btn btn-sm btn-warning">All Testimonials</a>
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
                                    <td>Title</td>
                                    <td>:</td>
                                    <td>{{$message->message_f_name}}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>:</td>
                                    <td>{{$message->message_l_name}}</td>
                                </tr>
                                <tr>
                                    <td>Detail</td>
                                    <td>:</td>
                                    <td>{{$message->message_subject}}</td>
                                </tr>
                                <tr>
                                    <td>Detail</td>
                                    <td>:</td>
                                    <td>{{$message->message_message}}</td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>:</td>
                                    <td>{{$message->created_at->format('D d M Y g:i:s A')}}</td>
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
