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
                    <li class="breadcrumb-item active">Banners</li>
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

        @if(Session::has('success_banner_soft'))
        <script>
            swal({
                title: "Success!",
                text: "User registration Success !",
                icon: "success",
                timer: 5000
            });

        </script>
        @endif

        @if(Session::has('error_banner_soft'))
        <script>
            swal({
                title: "Opps!",
                text: "Upload failed! Please try again.",
                icon: "warning",
                timer: 7000
            });

        </script>
        @endif

        <div class="card">
            <div class="card-header bg-info">
                <div class="row">
                    <div class="col-md-8 header_text">
                        <i class="fa fa-bandcamp"></i> All Banners
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/banner/add')}}" class="btn btn-sm btn-warning"><i
                                class="fa fa-plus-circle"></i> Add Banners</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped all_view_table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Banner Title</th>
                                <th scope="col">Banner Subtitle</th>
                                <th scope="col">Banner Details</th>
                                <th scope="col">Button 1</th>
                                <th scope="col">Button Url 1</th>
                                <th scope="col">Button 2</th>
                                <th scope="col">Button Url 2</th>
                                <th scope="col">Banner Photo</th>
                                <th scope="col">Uploader</th>
                                <th scope="col">Updator</th>
                                <th scope="col">Time</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $data)

                            <tr>
                                <td>{{str_limit($data->ban_title, 10)}}</td>
                                <td>{{str_limit($data->ban_subtitle, 10)}}</td>
                                <td>{{str_limit($data->ban_details, 10)}}</td>
                                <td>{{$data->ban_btn1}}</td>
                                <td>{{str_limit($data->ban_url1, 10)}}</td>
                                <td>{{$data->ban_btn2}}</td>
                                <td>{{str_limit($data->ban_url2, 10)}}</td>
                                <td><img src="{{asset('uploads/banners/'.$data->ban_photo)}}" width="100" alt="banner photo"></td>
                                <td>{{$data->uploaderName->name}}</td>
                                <td>
                                    @if (!empty($data->banner_updator))
                                        
                                    {{$data->updatorName->name}}
                                    
                                    @endif
                                </td>
                                <td>{{$data->created_at->format('d M y g:i:s A')}}</td>
                                <td>
                                    <a href="{{url('admin/banner/view/'.$data->ban_slug)}}"><i class="fa fa-plus-circle fa-lg"></i></a>
                                    <a href="{{url('admin/banner/edit/'.$data->ban_slug)}}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                    <a href="{{url('admin/banner/soft-delete/'.$data->ban_slug)}}"><i class="fa fa-trash fa-lg"></i></a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-info">print</a>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
