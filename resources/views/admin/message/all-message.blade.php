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
                    <li class="breadcrumb-item active">Messages</li>
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

        @if(Session::has('success_message_soft'))
        <script>
            swal({
                title: "Success!",
                text: "User registration Success !",
                icon: "success",
                timer: 5000
            });

        </script>
        @endif

        @if(Session::has('error_message_soft'))
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
                        <i class="fa fa-bandcamp"></i> All Messages
                    </div>
                    <div class="col-md-4 header_button">
                        <a href="{{url('admin/message/add')}}" class="btn btn-sm btn-warning"><i
                                class="fa fa-plus-circle"></i> Add Messages</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped all_view_table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Time</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $data)

                            <tr>
                                <td>{{$data->message_f_name}}</td>
                                <td>{{$data->message_l_name}}</td>
                                <td>{{str_limit($data->message_email, 10)}}</td>
                                <td>{{str_limit($data->message_subject, 10)}}</td>
                                <td>{{str_limit($data->message_message, 10)}}</td>
                                <td>{{$data->created_at->format('d M y g:i:s A')}}</td>
                                <td>
                                    <a href="{{url('admin/message/view/'.$data->message_slug)}}"><i class="fa fa-plus-circle fa-lg"></i></a>
                                    <a href="{{url('admin/message/soft-delete/'.$data->message_slug)}}"><i class="fa fa-trash fa-lg"></i></a>
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
