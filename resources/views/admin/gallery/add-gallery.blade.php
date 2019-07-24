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
                    <li class="breadcrumb-item active">Galleries</li>
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
            <form method="post" action="{{url('admin/gallery/add/upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Add Gallery Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/gallery')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i>
                                All Galleries</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_gallery_upload'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_gallery_upload'))
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
                        <div class="form-group row{{$errors->has('views')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Gallery Views:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="views" value="{{old('views')}}">
                                @if ($errors->has('views'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('views') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('comments')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Gallery Comments:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="comments" value="{{old('comments')}}">
                                @if ($errors->has('comments'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('comments') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Gallery Photo:</label>
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
                    <button type="submit" class="btn btn-sm btn-info">UPLOAD</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
