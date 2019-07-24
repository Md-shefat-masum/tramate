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

        @if(Session::has('success_comment_soft'))
        <script>
            swal({
                title: "Success!",
                text: "User registration Success !",
                icon: "success",
                timer: 5000
            });

        </script>
        @endif

        @if(Session::has('error_comment_soft'))
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
                        <i class="fa fa-bandcamp"></i> All Testimonials
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/comment/add')}}" class="btn btn-sm btn-warning"><i
                                class="fa fa-plus-circle"></i> Add Testimonial</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped all_view_table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Details</th>
                                <th scope="col">Button 1</th>
                                <th scope="col">Button 1</th>
                                <th scope="col">Time</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $data)

                            <tr>
                                <td>{{$data->comment_name}}</td>
                                <td>{{str_limit($data->comment_email, 20)}}</td>
                                <td>{{str_limit($data->comment_comment, 20)}}</td>
                                <td>{{$data->created_at->format('d M y g:i:s A')}}</td>
                                <td>
                                    <a href="{{url('admin/comment/view/'.$data->comment_slug)}}"><i class="fa fa-plus-circle fa-lg"></i></a>
                                    <a href="{{url('admin/comment/soft-delete/'.$data->comment_slug)}}"><i class="fa fa-trash fa-lg"></i></a>
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
