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
                    <li class="breadcrumb-item active">Testimonials</li>
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
            <form method="post" action="{{url('admin/testimonial/edit/update/'.$testi->testi_slug)}}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Testimonial Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/testimonial')}}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-th"></i>
                                All Testimonials</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_testimonial_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_testimonial_edit'))
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
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Client Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" value="{{$testi->testi_name}}">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('desig')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Client Designation:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="desig" value="{{$testi->testi_desig}}">
                                        @if ($errors->has('desig'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('desig') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('descrip')? ' has-error':''}}">
                                        <label for="" class="col-sm-3 col-form-label cus_flabel">Client Description:</label>
                                        <div class="col-sm-8">
                                            <textarea name="descrip" id="" class="form-control"
                                                value="">{{$testi->testi_descrip}}</textarea>
                                            @if ($errors->has('descrip'))
                                            <span class="invalid-feedback mb-0" role="alert">
                                                <strong>{{ $errors->first('descrip') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Client Photo:</label>
                            <div class="col-sm-8">
                                <input type="file" name="photo">
                                <img src="{{asset('uploads/testimonials/'.$testi->testi_photo)}}" width="100"
                                    alt="testimonial photo">
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
                    <button type="submit" class="btn btn-sm btn-info">UPDATE</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
