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
                    <li class="breadcrumb-item active">Why Choose Us</li>
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
            <form method="post" action="{{url('admin/choose-us/edit/update/'.$choose->choose_slug)}}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Choose Us Information
                        </div>
                        <div class="col-md-4 header_button">
                            <a href="{{url('admin/choose-us')}}" class="btn btn-sm btn-warning"><i
                                    class="fa fa-th"></i>
                                All Choose Uses</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_choose_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_choose_edit'))
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
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Choose Us title:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" value="{{$choose->choose_title}}">
                                @if ($errors->has('title'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('details')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Choose Us Detail:</label>
                            <div class="col-sm-8">
                                <textarea name="details" id="" class="form-control"
                                    value="">{{$choose->choose_details}}</textarea>
                                @if ($errors->has('details'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('details') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('li1')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Choose Us List 1:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="li1"
                                    value="{{$choose->choose_li1}}">
                                @if ($errors->has('li1'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('li1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('li2')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Choose Us List 2:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="li2"
                                    value="{{$choose->choose_li2}}">
                                @if ($errors->has('li2'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('li2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('li3')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Choose Us List 3:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="li3"
                                    value="{{$choose->choose_li3}}">
                                @if ($errors->has('li3'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('li3') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('li4')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Choose Us List 4:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="li4"
                                    value="{{$choose->choose_li4}}">
                                @if ($errors->has('li4'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('li4') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('btn1')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Button 1:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="btn1"
                                    value="{{$choose->choose_btn1}}">
                                @if ($errors->has('btn1'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('btn1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('url1')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Button Url 1:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="url1"
                                    value="{{$choose->choose_url1}}">
                                @if ($errors->has('url1'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('url1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('btn2')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Button 2:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="btn2"
                                    value="{{$choose->choose_btn2}}">
                                @if ($errors->has('btn2'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('btn2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('url2')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Button Url 2:</label>
                            <div class="col-sm-8">
                                <input type="text" id="password-confirm" class="form-control" name="url2"
                                    value="{{$choose->choose_url2}}">
                                @if ($errors->has('url2'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('url2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Choose Us Photo:</label>
                            <div class="col-sm-8">
                                <input type="file" name="photo">
                                <img src="{{asset('uploads/chooses/'.$choose->choose_photo)}}" width="100"
                                    alt="choose us photo">
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
