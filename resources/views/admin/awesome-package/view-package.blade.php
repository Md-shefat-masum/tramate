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
                    <li class="breadcrumb-item active">Awesome Packages</li>
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
                        View Awesome Package Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/awesome-package')}}" class="btn btn-sm btn-warning">All Awesome Packages</a>
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
                                    <td>Awesome Package Title</td>
                                    <td>:</td>
                                    <td>{{$awesome->awesome_title}}</td>
                                </tr>
                                <tr>
                                    <td>Awesome Package Detail</td>
                                    <td>:</td>
                                    <td>{{$awesome->awesome_details}}</td>
                                </tr>
                                <tr>
                                    <td>Awesome Package Place</td>
                                    <td>:</td>
                                    <td>{{$awesome->awesome_place}}</td>
                                </tr>
                                <tr>
                                    <td>Awesome Package Date</td>
                                    <td>:</td>
                                    <td>{{$awesome->awesome_date}}</td>
                                </tr>
                                <tr>
                                    <td>Awesome Package Photo</td>
                                    <td>:</td>
                                    <td><img src="{{asset('uploads/awesomes/'.$awesome->awesome_photo)}}" width="200" alt="awesome package photo"></td>
                                </tr>
                                <tr>
                                    <td>Uploader</td>
                                    <td>:</td>
                                    <td>{{$awesome->uploaderName->name}}</td>
                                </tr>
                                <tr>
                                    <td>Updator</td>
                                    <td>:</td>
                                    <td>
                                        @if (!empty($awesome->awesome_updator))
                                        
                                        {{$awesome->updatorName->name}}
                                    
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>:</td>
                                    <td>{{$awesome->created_at->format('D d M Y g:i:s A')}}</td>
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
