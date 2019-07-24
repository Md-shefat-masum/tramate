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
        <div class="card">
            <form method="post" action="{{url('admin/counter/update/'.$counter->counter_slug)}}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Counter Information
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_counter_edit'))
                    <script>
                        swal({
                            counter: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_counter_edit'))
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
                        <div class="form-group row{{$errors->has('tourist')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Counter Happy Tourist:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tourist" value="{{$counter->counter_tourist}}">
                                @if ($errors->has('tourist'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('tourist') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('tour')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Counter Great Tour:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="tour"
                                    value="{{$counter->counter_tour}}">
                                @if ($errors->has('tour'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('tour') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('guide')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Counter Tourist Guide:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="guide"
                                    value="{{$counter->counter_guide}}">
                                @if ($errors->has('guide'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('guide') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('support')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Counter Hour Supported:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="support"
                                    value="{{$counter->counter_supported}}">
                                @if ($errors->has('support'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('support') }}</strong>
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
