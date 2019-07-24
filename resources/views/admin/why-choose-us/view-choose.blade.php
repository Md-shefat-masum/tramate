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
                        View Choose Us Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/choose-us')}}" class="btn btn-sm btn-warning">All Choose Uses</a>
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
                                    <td>Choose Us Title</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_title}}</td>
                                </tr>
                                <tr>
                                    <td>Choose Us Detail</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_details}}</td>
                                </tr>
                                <tr>
                                    <td>List 1</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_li1}}</td>
                                </tr>
                                <tr>
                                    <td>List 2</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_li2}}</td>
                                </tr>
                                <tr>
                                    <td>List 3</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_li3}}</td>
                                </tr>
                                <tr>
                                    <td>List 4</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_li4}}</td>
                                </tr>
                                <tr>
                                    <td>Button 1</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_btn1}}</td>
                                </tr>
                                <tr>
                                    <td>Button Url 1</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_url1}}</td>
                                </tr>
                                <tr>
                                    <td>Button 2</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_btn2}}</td>
                                </tr>
                                <tr>
                                    <td>Button Url 2</td>
                                    <td>:</td>
                                    <td>{{$choose->choose_url2}}</td>
                                </tr>
                                <tr>
                                    <td>Choose Us Photo</td>
                                    <td>:</td>
                                    <td><img src="{{asset('uploads/chooses/'.$choose->choose_photo)}}" width="200" alt="choose us photo"></td>
                                </tr>
                                <tr>
                                    <td>Uploader</td>
                                    <td>:</td>
                                    <td>{{$choose->uploaderName->name}}</td>
                                </tr>
                                <tr>
                                    <td>Updator</td>
                                    <td>:</td>
                                    <td>
                                        @if (!empty($choose->choose_updator))
                                        
                                        {{$choose->updatorName->name}}
                                    
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>:</td>
                                    <td>{{$choose->created_at->format('D d M Y g:i:s A')}}</td>
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
