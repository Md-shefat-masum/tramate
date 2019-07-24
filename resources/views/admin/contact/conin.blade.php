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
                    <li class="breadcrumb-item active">Contact Information</li>
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
            <form method="post" action="{{url('admin/conin/update/'.$conin->conin_slug)}}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Contact Information
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_conin_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_conin_edit'))
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
                        <div class="form-group row{{$errors->has('location')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Contact Location Info:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="location" value="{{$conin->conin_location}}">
                                @if ($errors->has('location'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('phone')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Contact Phone Info:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="phone"
                                    value="{{$conin->conin_phone}}">
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('fax')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Contact Fax Info:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="fax"
                                    value="{{$conin->conin_fax}}">
                                @if ($errors->has('fax'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('fax') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('email')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Contact Email Info:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="email"
                                    value="{{$conin->conin_email}}">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
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
