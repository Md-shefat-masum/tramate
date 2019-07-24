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
                    <li class="breadcrumb-item active">Blogs</li>
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
            <form method="post" action="{{url('admin/blog/add/upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Add Blog Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/blog')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i>
                                All Blogs</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_blog_upload'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_blog_upload'))
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
                        <div class="form-group row{{$errors->has('title')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Blog Title:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                @if ($errors->has('title'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('details')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Blog Details:</label>
                            <div class="col-sm-8">
                                <textarea name="details" id="" class="form-control"
                                value="">{{old('details')}}</textarea>
                                @if ($errors->has('details'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('details') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('cate')? ' has-error':''}}">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Blog Category:</label>
                                <div class="col-sm-8">
                                    <select name="cate" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($cate as $data)
                                            
                                        <option value="{{$data->cate_id}}">{{$data->cate_name}}</option>
                                        
                                        @endforeach
                                    </select>
                                    @if ($errors->has('cate'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('cate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Blog Photo:</label>
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
