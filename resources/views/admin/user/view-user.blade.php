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
                    <li class="breadcrumb-item active">Users</li>
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
                        View User Information
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/user')}}" class="btn btn-sm btn-warning">All Users</a>
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
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Role Name</td>
                                <td>:</td>
                                <td>{{$user->roleName->role_name}}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>:</td>
                                <td><img src="{{asset('uploads/users/'.$user->photo)}}" width="200" alt="user photo"></td>
                            </tr>
                            <tr>
                                <td>Creator</td>
                                <td>:</td>
                                <td>{{$user->creator}}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td>{{$user->created_at->format('D d M Y g:i:s A')}}}}</td>
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
