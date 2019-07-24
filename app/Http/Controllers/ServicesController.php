<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Image;
use Auth;
use Carbon\Carbon;
use Session;
use App\ServiceType;

class ServicesController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Service::where('service_status', 1)->orderBy('service_id', 'DESC')->get();
        return view('admin.service.all-service',compact('all'));
    }

    public function add(){
        $type=ServiceType::where('service_type_status', 1)->orderBy('service_type_id', 'DESC')->get();
        return view('admin.service.add-service', compact('type'));
    }

    public function view($slug){
        $service=Service::where('service_status',1)->where('service_slug', $slug)->firstOrFail();
        return view('admin.service.view-service',compact('service'));
    }

    public function edit($slug){
        $type=ServiceType::where('service_type_status', 1)->orderBy('service_type_id', 'DESC')->get();
        $service=Service::where('service_status',1)->where('service_slug', $slug)->firstOrFail();
        return view('admin.service.edit-service',compact('service', 'type'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'type'=>'required',
            'photo'=>'required',
        ],[
            'name.required'=>'Please Enter a Company Name',
            'type.required'=>'Please Enter The Type of Service',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='SER_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,400)->save('uploads/services/'.$imgName);
        }

        $slug='SER_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Service::insert([
            'service_name'=>$_POST['name'],
            'service_type_id'=>$_POST['type'],
            'service_photo'=>$imgName,
            'service_slug'=>$slug,
            'service_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_service_upload','value');
            return redirect('admin/service/add');
        } else {
            Session::flash('error_service_upload','value');
            return redirect('admin/service/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='SER_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,400)->save('uploads/services/'.$imgName);
        }else {
            $img= Service::where('service_status', 1)->where('service_slug', $slug)->firstOrFail();
            $imgName=$img->service_photo;
        }

        $updator=Auth::user()->id;
        $update=Service::where('service_status', 1)->where('service_slug', $slug)->update([
            'service_name'=>$_POST['name'],
            'service_type_id'=>$_POST['type'],
            'service_photo'=>$imgName,
            'service_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_service_edit','value');
            return redirect('admin/service/edit/'.$slug);
        } else {
            Session::flash('error_service_edit','value');
            return redirect('admin/service/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Service::where('service_status',1)->where('service_slug',$slug)->update([
            'service_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_service_soft','value');
            return redirect('admin/service');
        }else{
            Session::flash('error_service_soft','value');
            return redirect('admin/service');
        }
      }
}
