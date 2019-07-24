<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\From;
use Auth;
use Carbon\Carbon;
use Session;
use App\To;

class LocationController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        return view('admin.location.all-location',compact('all'));
    }

    public function add(){
        return view('admin.location.add-location');
    }

    public function view($slug){
        $from=From::where('from_status',1)->where('from_slug', $slug)->firstOrFail();
        return view('admin.location.view-location',compact('from'));
    }

    public function edit($slug){
        $from=From::where('from_status',1)->where('from_slug', $slug)->firstOrFail();
        return view('admin.location.edit-location',compact('from'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>'Please Enter a Location Name'
        ]);

        $slug='LOC_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert1=From::insert([
            'from_name'=>$_POST['name'],
            'from_slug'=>$slug,
            'from_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        $insert2=To::insert([
            'to_name'=>$_POST['name'],
            'to_slug'=>$slug,
            'to_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert1 && $insert2) {
            Session::flash('success_location_upload','value');
            return redirect('admin/location/add');
        } else {
            Session::flash('error_location_upload','value');
            return redirect('admin/location/add');
        }
        
    }

    public function update($slug){
        
        $updator=Auth::user()->id;
        $update1=From::where('from_status', 1)->where('from_slug', $slug)->update([
            'from_name'=>$_POST['name'],
            'from_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        $update2=To::where('to_status', 1)->where('to_slug', $slug)->update([
            'to_name'=>$_POST['name'],
            'to_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update1 && $update2) {
            Session::flash('success_location_edit','value');
            return redirect('admin/location/edit/'.$slug);
        } else {
            Session::flash('error_location_edit','value');
            return redirect('admin/location/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=From::where('from_status',1)->where('from_slug',$slug)->update([
            'from_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_location_soft','value');
            return redirect('admin/location');
        }else{
            Session::flash('error_location_soft','value');
            return redirect('admin/location');
        }
      }
}
