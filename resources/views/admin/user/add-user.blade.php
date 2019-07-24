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
            <form method="post" action="{{url('admin/user/add/insert')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Add User Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/user')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i> All Users</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_user_insert'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_user_insert'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Upload failed! Please try again.",
                            icon: "warning",
                            timer: 7000
                        });

                    </script>
                    @endif
                    <div class="form-body cus_fbody">
                        <div class="form-group row{{$errors->has('name')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('email')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('password')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Password:</label>
                            <div class="col-sm-8">
                                <input id="password" type="password" class="form-control" name="password"
                                    value="{{old('password')}}">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('password_confirmation')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Re-Password:</label>
                            <div class="col-sm-8">
                                <input type="password" id="password-confirm" class="form-control"
                                    name="password_confirmation" value="{{old('password')}}">
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('role')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">User Role:</label>
                            <div class="col-sm-8">
                                <select name="role" class="form-control">
                                    <option value="">Select User Role</option>
                                    @foreach ($role as $data)
                                        
                                    <option value="{{$data->role_id}}">{{$data->role_name}}</option>
                                    
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Photo:</label>
                            <div class="col-sm-8">
                                <input type="file" name="photo">
                                @if ($errors->has('photo'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-info">REGISTRATION</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
