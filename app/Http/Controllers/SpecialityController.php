<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speciality;
use Image;
use Auth;
use Carbon\Carbon;
use Session;
use App\From;

class SpecialityController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Speciality::where('speciality_status', 1)->orderBy('speciality_id', 'DESC')->get();
        return view('admin.speciality.all-speciality',compact('all'));
    }

    public function add(){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        return view('admin.speciality.add-speciality', compact('from'));
    }

    public function view($slug){
        $speciality=Speciality::where('speciality_status',1)->where('speciality_slug', $slug)->firstOrFail();
        return view('admin.speciality.view-speciality',compact('speciality'));
    }

    public function edit($slug){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        $speciality=Speciality::where('speciality_status',1)->where('speciality_slug', $slug)->firstOrFail();
        return view('admin.speciality.edit-speciality',compact('speciality', 'from'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'name'=>'required',
            'details'=>'required',
            'photo'=>'required',
        ],[
            'from.required'=>'Please Enter The Location',
            'name.required'=>'Please Enter a Name',
            'details.required'=>'Please Enter a Detail',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='SPL_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/specialitys/'.$imgName);
        }

        $slug='SPL_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Speciality::insert([
            'from_id'=>$_POST['from'],
            'speciality_name'=>$_POST['name'],
            'speciality_details'=>$_POST['details'],
            'speciality_photo'=>$imgName,
            'speciality_slug'=>$slug,
            'speciality_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_speciality_upload','value');
            return redirect('admin/speciality/add');
        } else {
            Session::flash('error_speciality_upload','value');
            return redirect('admin/speciality/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='SPL_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/specialitys/'.$imgName);
        }else {
            $img= Speciality::where('speciality_status', 1)->where('speciality_slug', $slug)->firstOrFail();
            $imgName=$img->speciality_photo;
        }

        $updator=Auth::user()->id;
        $update=Speciality::where('speciality_status', 1)->where('speciality_slug', $slug)->update([
            'from_id'=>$_POST['from'],
            'speciality_name'=>$_POST['name'],
            'speciality_details'=>$_POST['details'],
            'speciality_photo'=>$imgName,
            'speciality_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_speciality_edit','value');
            return redirect('admin/speciality/edit/'.$slug);
        } else {
            Session::flash('error_speciality_edit','value');
            return redirect('admin/speciality/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Speciality::where('speciality_status',1)->where('speciality_slug',$slug)->update([
            'speciality_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_speciality_soft','value');
            return redirect('admin/speciality');
        }else{
            Session::flash('error_speciality_soft','value');
            return redirect('admin/speciality');
        }
      }
}
