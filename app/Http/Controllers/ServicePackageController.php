<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceSearch;
use App\From;
use App\To;
use App\Service;
use Carbon\Carbon;
use Session;

class ServicePackageController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index1(){
        $all=ServiceSearch::where('service_status', 1)->where('service_type_id', 1)->orderBy('service_search_id', 'DESC')->get();
        return view('admin.service-package.all-flights',compact('all'));
    }

    public function index2(){
        $all=ServiceSearch::where('service_status', 1)->where('service_type_id', 2)->orderBy('service_id', 'DESC')->get();
        return view('admin.service-package.all-hotels',compact('all'));
    }

    public function index3(){
        $all=ServiceSearch::where('service_status', 1)->where('service_type_id', 3)->orderBy('service_id', 'DESC')->get();
        return view('admin.service-package.all-buses',compact('all'));
    }

    public function add(){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        $to=To::where('to_status', 1)->orderBy('to_id', 'DESC')->get();
        $service=Service::where('service_status', 1)->orderBy('service_id', 'DESC')->get();
        return view('admin.service-package.add-service-package', compact('from', 'to', 'service'));
    }

    public function view($slug){
        $service=ServiceSearch::where('service_status',1)->where('service_slug', $slug)->firstOrFail();
        return view('admin.service-package.view-service-package',compact('service'));
    }

    public function edit($slug){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        $to=To::where('to_status', 1)->orderBy('to_id', 'DESC')->get();
        $service=Service::where('service_status', 1)->orderBy('service_id', 'DESC')->get();
        $service2=ServiceSearch::where('service_status',1)->where('service_slug', $slug)->firstOrFail();
        return view('admin.service-package.edit-service-package',compact('from', 'to', 'service', 'service2'));
    }

    public function upload_flight(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
            'service'=>'required',
            'hours'=>'required',
            'minute'=>'required',
            'period'=>'required',
            'price'=>'required',
        ],[
            'from.required'=>'Please Enter The Location',
            'to.required'=>'Please Enter The Location',
            'service.required'=>'Please Enter The Flight',
            'hours.required'=>'Please Enter Hour',
            'minute.required'=>'Please Enter Minute ',
            'period.required'=>'Please Enter Period',
            'price.required'=>'Please Enter a Price',
        ]);

        $time=$_POST['hours'].':'.$_POST['minute'].' '.$_POST['period'];

        $slug='FLG_'.uniqid(2019);
        $insert=ServiceSearch::insert([
            'from_id'=>$_POST['from'],
            'to_id'=>$_POST['to'],
            'service_id'=>$_POST['service'],
            'service_type_id'=>'1',
            'time'=>$time,
            'price'=>$_POST['price'],
            'service_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_flight_upload','value');
            return redirect('admin/service-package/add');
        } else {
            Session::flash('error_flight_upload','value');
            return redirect('admin/service-package/add');
        }
        
    }

    public function upload_hotel(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'service'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'price'=>'required',
        ],[
            'from.required'=>'Please Enter The Location',
            'service.required'=>'Please Enter The Hotel',
            'address.required'=>'Please Enter a Address',
            'contact.required'=>'Please Enter a Contact Number',
            'price.required'=>'Please Enter a Price',
        ]);

        $slug='HTL_'.uniqid(2019);
        $insert=ServiceSearch::insert([
            'from_id'=>$_POST['from'],
            'service_id'=>$_POST['service'],
            'service_type_id'=>'2',
            'price'=>$_POST['price'],
            'address'=>$_POST['address'],
            'address'=>$_POST['contact'],
            'service_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_hotel_upload','value');
            return redirect('admin/service-package/add');
        } else {
            Session::flash('error_hotel_upload','value');
            return redirect('admin/service-package/add');
        }
        
    }

    public function upload_bus(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
            'service'=>'required',
            'hours'=>'required',
            'minute'=>'required',
            'period'=>'required',
            'price'=>'required',
        ],[
            'from.required'=>'Please Enter The Location',
            'to.required'=>'Please Enter The Location',
            'service.required'=>'Please Enter The Bus',
            'hours.required'=>'Please Enter Hour',
            'minute.required'=>'Please Enter Minute ',
            'period.required'=>'Please Enter Period',
            'price.required'=>'Please Enter a Price',
        ]);

        $time=$_POST['hours'].':'.$_POST['minute'].' '.$_POST['period'];

        $slug='BUS_'.uniqid(2019);
        $insert=ServiceSearch::insert([
            'from_id'=>$_POST['from'],
            'to_id'=>$_POST['to'],
            'service_id'=>$_POST['service'],
            'service_type_id'=>'3',
            'time'=>$time,
            'price'=>$_POST['price'],
            'service_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_bus_upload','value');
            return redirect('admin/bus/add');
        } else {
            Session::flash('error_bus_upload','value');
            return redirect('admin/bus/add');
        }
        
    }

    public function update(Request $request, $slug){

        if (!empty($request->hours)) {
            $hours=$request->hours;
            if (!empty($request->minute)) {
                $minute=$request->minute;
                if (!empty($request->period)) {
                    $period=$request->period;
                    $time2=$hours.':'.$minute.' '.$period;
                } else {
                    $time1= ServiceSearch::where('service_status',1)->where('service_slug', $slug)->firstOrFail();
                    $time2=$time1->time;
                }
            } else {
                $time1= ServiceSearch::where('service_status',1)->where('service_slug', $slug)->firstOrFail();
                $time2=$time1->time;
            }
        }else {
            $time1= ServiceSearch::where('service_status',1)->where('service_slug', $slug)->firstOrFail();
            $time2=$time1->time;
        }

        $time=$time2;
        $update=ServiceSearch::where('service_status', 1)->where('service_slug', $slug)->update([
            'from_id'=>$_POST['from'],
            'to_id'=>$_POST['to'],
            'service_id'=>$_POST['service'],
            'time'=>$time,
            'price'=>$_POST['price'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_service-package_edit','value');
            return redirect('admin/service-package/edit/'.$slug);
        } else {
            Session::flash('error_service-package_edit','value');
            return redirect('admin/service-package/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function update2(Request $request, $slug){

        $update=ServiceSearch::where('service_status', 1)->where('service_slug', $slug)->update([
            'from_id'=>$_POST['from'],
            'service_id'=>$_POST['service'],
            'price'=>$_POST['price'],
            'address'=>$_POST['address'],
            'address'=>$_POST['contact'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_service-package_edit','value');
            return redirect('admin/service-package/edit/'.$slug);
        } else {
            Session::flash('error_service-package_edit','value');
            return redirect('admin/service-package/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=ServiceSearch::where('service_status',1)->where('service_slug',$slug)->update([
            'service_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_service-package_soft','value');
            return redirect()->back();
        }else{
            Session::flash('error_service-package_soft','value');
            return redirect()->back();
        }
      }
}
