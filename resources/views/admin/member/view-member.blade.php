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
                    <li class="breadcrumb-item active">Members</li>
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
                        View Members Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/member')}}" class="btn btn-sm btn-warning">All Members</a>
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
                                    <td>Member Name</td>
                                    <td>:</td>
                                    <td>{{$member->member_name}}</td>
                                </tr>
                                <tr>
                                    <td>Member Designation</td>
                                    <td>:</td>
                                    <td>{{$member->member_desig}}</td>
                                </tr>
                                <tr>
                                    <td>Social Media Url 1</td>
                                    <td>:</td>
                                    <td>{{$member->member_url1}}</td>
                                </tr>
                                <tr>
                                    <td>Social Media Url 2</td>
                                    <td>:</td>
                                    <td>{{$member->member_url2}}</td>
                                </tr>
                                <tr>
                                    <td>Social Media Url 3</td>
                                    <td>:</td>
                                    <td>{{$member->member_url3}}</td>
                                </tr>
                                <tr>
                                    <td>Social Media Url 4</td>
                                    <td>:</td>
                                    <td>{{$member->member_url4}}</td>
                                </tr>
                                <tr>
                                    <td>Member Photo</td>
                                    <td>:</td>
                                    <td><img src="{{asset('uploads/members/'.$member->member_photo)}}" width="200"
                                        alt="member photo"></td>
                                    </tr>
                                                        <tr>
                                                            <td>Uploader</td>
                                                            <td>:</td>
                                                            <td>{{$member->uploaderName->name}}</td>
                                                        </tr>
                                <tr>
                                    <td>Updator</td>
                                    <td>:</td>
                                    <td>
                                        @if (!empty($member->member_updator))
                                        
                                        {{$member->updatorName->name}}
                                    
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>:</td>
                                    <td>{{$member->created_at->format('D d M Y g:i:s A')}}</td>
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
