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
                    <li class="breadcrumb-item active">Hotels</li>
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
                        View Hotel Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/hotels')}}" class="btn btn-sm btn-warning">All Hotels</a>
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
                                <td>Hotel's Location</td>
                                <td>:</td>
                                <td>{{$hotels->from->from_name}}</td>
                            </tr>
                            <tr>
                                <td>Hotel Name</td>
                                <td>:</td>
                                <td>{{$hotels->hotelName->service_name}}</td>
                            </tr>
                            <tr>
                                <td>Hotel Details</td>
                                <td>:</td>
                                <td>{{$hotels->hotel_details}}</td>
                            </tr>
                            <tr>
                                <td>Hotel Type</td>
                                <td>:</td>
                                <td>{{$hotels->hotel_star}}</td>
                            </tr>
                            <tr>
                                <td>Food Status</td>
                                <td>:</td>
                                <td>{{$hotels->hotel_food_status}}</td>
                            </tr>
                            <tr>
                                <td>Room Price</td>
                                <td>:</td>
                                <td>{{$hotels->hotel_price}}</td>
                            </tr>
                            <tr>
                                <td>Hotel Contact</td>
                                <td>:</td>
                                <td>{{$hotels->hotel_contact}}</td>
                            </tr>
                            <tr>
                                <td>Hotel Address</td>
                                <td>:</td>
                                <td>{{$hotels->hotel_address}}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>:</td>
                                <td><img src="{{asset('uploads/services/'.$hotels->hotelName->service_photo)}}" width="100" alt="hotel photo"></td>
                            </tr>
                            <tr>
                                <td>Uploader</td>
                                <td>:</td>
                                <td>{{$hotels->uploaderName->name}}</td>
                            </tr>
                            <tr>
                                <td>Updator</td>
                                <td>:</td>
                                <td>
                                        @if (!empty($hotels->hotel_updator))

                                            {{$hotels->updatorName->name}}

                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td>{{$hotels->created_at->format('D d M Y g:i:s A')}}</td>
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
