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
                    <li class="breadcrumb-item active">Destination Sliders</li>
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
                        View Destination Slider Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/desti-slider')}}" class="btn btn-sm btn-warning">All Destination Sliders</a>
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
                                    <td>Destination Slider Title</td>
                                    <td>:</td>
                                    <td>{{$slider->slider_title}}</td>
                                </tr>
                                <tr>
                                    <td>Destination Slider Detail</td>
                                    <td>:</td>
                                    <td>{{$slider->slider_details}}</td>
                                </tr>
                                <tr>
                                    <td>Destination Slider Price</td>
                                    <td>:</td>
                                    <td>{{$slider->slider_price}}</td>
                                </tr>
                                <tr>
                                    <td>Destination Slider Rate</td>
                                    <td>:</td>
                                    <td>{{$slider->slider_rate}}</td>
                                </tr>
                                <tr>
                                    <td>Destination Slider Quality</td>
                                    <td>:</td>
                                    <td>{{$slider->slider_quality}}</td>
                                </tr>
                                <tr>
                                    <td>Destination Slider Visit</td>
                                    <td>:</td>
                                    <td>{{$slider->slider_visit}}</td>
                                </tr>
                                <tr>
                                    <td>Destination Slider Category</td>
                                    <td>:</td>
                                    <td>{{$slider->categoryName->descate_name}}</td>
                                </tr>
                                <tr>
                                    <td>Destination Slider Photo</td>
                                    <td>:</td>
                                    <td><img src="{{asset('uploads/desti-sliders/'.$slider->slider_photo)}}" width="200"
                                            alt="slider photo"></td>
                                </tr>
                                <tr>
                                    <td>Uploader</td>
                                    <td>:</td>
                                    <td>{{$slider->uploaderName->name}}</td>
                                </tr>
                                <tr>
                                    <td>Updator</td>
                                    <td>:</td>
                                    <td>
                                        @if (!empty($slider->slider_updator))
                                        
                                        {{$slider->updatorName->name}}
                                    
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>:</td>
                                    <td>{{$slider->created_at->format('D d M Y g:i:s A')}}}}</td>
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
