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
                    <li class="breadcrumb-item active">Visitable Places</li>
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
        <form method="post" action="{{url('admin/visitable/edit/update/'.$visitable->visitable_slug)}}" enctype="multipart/form-data">
            @csrf
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-8 header_text">
                            <i class="fa fa-bandcamp"></i> Edit Visitable Place Information
                        </div>
                        <div class="col-md-4 header_button">
                                <a href="{{url('admin/visitable')}}" class="btn btn-sm btn-warning"><i class="fa fa-th"></i> All Visitable Places</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success_visitable_edit'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_visitable_edit'))
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
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Visitable place's Location:</label>
                            <div class="col-sm-8">
                                <select name="from" class="form-control">
                                    <option value="">Select Location</option>
                                    @foreach ($from as $froms)

                                    <option value="{{$froms->from_id}}" {{Request::is($visitable->from_id==$froms->from_id)? 'selected':''}}>{{$froms->from_name}}</option>

                                    @endforeach
                                </select>
                                @if ($errors->has('from'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('from') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('name')? ' has-error':''}}">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Place Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{$visitable->visitable_name}}">
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row{{$errors->has('details')? ' has-error':''}}">
                                <label for="" class="col-sm-3 col-form-label cus_flabel">Place Dtails:</label>
                                <div class="col-sm-8">
                                    <textarea name="details" id="" class="form-control"
                                        value="">{{$visitable->visitable_details}}</textarea>
                                    @if ($errors->has('details'))
                                    <span class="invalid-feedback mb-0" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row{{$errors->has('address')? ' has-error':''}}">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Place Address:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="address" value="{{$visitable->visitable_address}}">
                                @if ($errors->has('address'))
                                <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label cus_flabel">Photo:</label>
                            <div class="col-sm-8">
                                <input type="file" name="photo">
                                <img src="{{asset('uploads/visitables/'.$visitable->visitable_photo)}}" width="100" alt="visitable place photo">
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
                    <button type="submit" class="btn btn-sm btn-info">SUBMIT</button>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    @endsection
