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
                    <li class="breadcrumb-item active">Plans</li>
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
                        View Plan Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/plan')}}" class="btn btn-sm btn-warning">All Plans</a>
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
                                    <td>Plan Title</td>
                                    <td>:</td>
                                    <td>{{$plan->plan_name}}</td>
                                </tr>
                                <tr>
                                    <td>Plan List No.1</td>
                                    <td>:</td>
                                    <td>{{$plan->plan_li1}}</td>
                                </tr>
                                <tr>
                                    <td>Plan List No.2</td>
                                    <td>:</td>
                                    <td>{{$plan->plan_li2}}</td>
                                </tr>
                                <tr>
                                    <td>Plan List No.3</td>
                                    <td>:</td>
                                    <td>{{$plan->plan_li3}}</td>
                                </tr>
                                <tr>
                                    <td>Plan List No.4</td>
                                    <td>:</td>
                                    <td>{{$plan->plan_li4}}</td>
                                </tr>
                                <tr>
                                    <td>Plan List No.5</td>
                                    <td>:</td>
                                    <td>{{$plan->plan_li5}}</td>
                                </tr>
                                <tr>
                                    <td>Plan Price</td>
                                    <td>:</td>
                                    <td>{{$plan->plan_price}}</td>
                                </tr>
                                <tr>
                                    <td>Button</td>
                                    <td>:</td>
                                    <td>{{$plan->plan_btn}}</td>
                                </tr>
                                <tr>
                                    <td>Button Url</td>
                                    <td>:</td>
                                    <td>{{$plan->plan_url}}</td>
                                </tr>
                                <tr>
                                    <td>Uploader</td>
                                    <td>:</td>
                                    <td>{{$plan->uploaderName->name}}</td>
                                </tr>
                                <tr>
                                    <td>Updator</td>
                                    <td>:</td>
                                    <td>
                                        @if (!empty($plan->Plan_updator))
                                
                                        {{$plan->updatorName->name}}
                                        
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>:</td>
                                    <td>{{$plan->created_at->format('D d M Y g:i:s A')}}</td>
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
