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
                    <li class="breadcrumb-item active">Hotels</li>
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
        <form method="post" action="{{url('admin/hotels/edit/update/'.$hotels->hotel_slug)}}" enctype="multipart/form-data">
            @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Hotel Information
                        </div>
                        <div class="col-md-4 header_button">
                                <a href="{{url('admin/hotels')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i> All Hotels</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_hotels_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_hotels_edit'))
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
                            <div class="form-group row{{$errors->has('from')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel's Location:</label>
                                    <div class="col-sm-8">
                                        <select name="from" class="form-control">
                                            <option value="">Select Location</option>
                                            @foreach ($from as $froms)
        
                                            <option value="{{$froms->from_id}}" {{Request::is($hotels->from_id==$froms->from_id)? 'selected':''}}>{{$froms->from_name}}</option>
        
                                            @endforeach
                                        </select>
                                        @if ($errors->has('from'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('from') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('service')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel Name:</label>
                                    <div class="col-sm-8">
                                        <select name="service" class="form-control">
                                            <option value="">Service Type</option>
                                            @foreach ($service as $services)
                                            @if ($services->service_type_id==2)
        
                                            <option value="{{$services->service_id}}" {{Request::is($hotels->hotel_name==$services->service_id)? 'selected':''}}>{{$services->service_name}}
                                            </option>
        
                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('service'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('service') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('details')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel Details:</label>
                                    <div class="col-sm-8">
                                        <textarea name="details" id="" class="form-control">{{$hotels->hotel_details}}</textarea>
                                        @if ($errors->has('details'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('details') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('star')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel Type:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="star" value="{{$hotels->hotel_star}}">
                                        @if ($errors->has('star'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('star') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('food')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Food Status:</label>
                                    <div class="col-sm-8">
                                        <select name="food" class="form-control">
                                            <option value="Yes" {{Request::is($hotels->hotel_food_status=='Yes')? 'selected':''}}>Yes</option>
                                            <option value="No" {{Request::is($hotels->hotel_food_status=='No')? 'selected':''}}>No</option>
                                        </select>
                                        @if ($errors->has('food'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('food') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('price')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Room Price:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="price" value="{{$hotels->hotel_price}}">
                                        @if ($errors->has('price'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('address')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel Address:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="address" value="{{$hotels->hotel_address}}">
                                        @if ($errors->has('address'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{$errors->has('contact')? ' has-error':''}}">
                                    <label for="" class="col-sm-3 col-form-label cus_flabel">Hotel Contact:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="contact" value="{{$hotels->hotel_contact}}">
                                        @if ($errors->has('contact'))
                                        <span class="invalid-feedback mb-0" role="alert">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-info">SUBMIT</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
