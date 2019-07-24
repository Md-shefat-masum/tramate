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
            <div class="card-header bg-info">
                <div class="row">
                    <div class="col-md-8 header_text">
                        View Restaurant Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/resturant')}}" class="btn btn-sm btn-warning">All Restaurants</a>
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
                                <td>Restaurant's Location</td>
                                <td>:</td>
                                <td>{{$resturant->from->from_name}}</td>
                            </tr>
                            <tr>
                                <td>Restaurant Name</td>
                                <td>:</td>
                                <td>{{$resturant->resturant_name}}</td>
                            </tr>
                            <tr>
                                <td>Restaurant Details</td>
                                <td>:</td>
                                <td>{{$resturant->resturant_details}}</td>
                            </tr>
                            <tr>
                                <td>Lowest Food Price</td>
                                <td>:</td>
                                <td>{{$resturant->resturant_lowest_rate}}</td>
                            </tr>
                            <tr>
                                <td>Highest Food Price</td>
                                <td>:</td>
                                <td>{{$resturant->resturant_highest_rate}}</td>
                            </tr>
                            <tr>
                                <td>Restaurant Address</td>
                                <td>:</td>
                                <td>{{$resturant->resturant_address}}</td>
                            </tr>
                            <tr>
                                <td>Restaurant Category</td>
                                <td>:</td>
                                <td>{{$resturant->categorey->cate_name}}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>:</td>
                                <td><img src="{{asset('uploads/resturants/'.$resturant->resturant_photo)}}" width="100" alt="resturant photo"></td>
                            </tr>
                            <tr>
                                <td>Uploader</td>
                                <td>:</td>
                                <td>{{$resturant->uploaderName->name}}</td>
                            </tr>
                            <tr>
                                <td>Updator</td>
                                <td>:</td>
                                <td>

                                        @if (!empty($resturant->resturant_updator))

                                            {{$resturant->updatorName->name}}

                                        @endif    
                                
                                </td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td>{{$resturant->created_at->format('D d M Y g:i:s A')}}</td>
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
