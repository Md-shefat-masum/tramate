<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Image;
use Auth;
use Carbon\Carbon;
use Session;

class TestimonialController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Testimonial::where('testi_status', 1)->orderBy('testi_id', 'DESC')->get();
        return view('admin.testimonial.all-testimonial',compact('all'));
    }

    public function add(){
        return view('admin.testimonial.add-testimonial');
    }

    public function view($slug){
        $testi=Testimonial::where('testi_status',1)->where('testi_slug', $slug)->firstOrFail();
        return view('admin.testimonial.view-testimonial',compact('testi'));
    }

    public function edit($slug){
        $testi=Testimonial::where('testi_status',1)->where('testi_slug', $slug)->firstOrFail();
        return view('admin.testimonial.edit-testimonial',compact('testi'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'desig'=>'required',
            'descrip'=>'required',
            'photo'=>'required',
        ],[
            'name.required'=>'Please Enter a name',
            'desig.required'=>'Please Enter Designation',
            'descrip.required'=>'Please Enter Description',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='TESTI_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(80,80)->save('uploads/testimonials/'.$imgName);
        }

        $slug='TESTI_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Testimonial::insert([
            'testi_name'=>$_POST['name'],
            'testi_desig'=>$_POST['desig'],
            'testi_descrip'=>$_POST['descrip'],
            'testi_photo'=>$imgName,
            'testi_slug'=>$slug,
            'testi_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_testimonial_upload','value');
            return redirect('admin/testimonial/add');
        } else {
            Session::flash('error_testimonial_upload','value');
            return redirect('admin/testimonial/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='TESTI_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(80,80)->save('uploads/testimonials/'.$imgName);
        }else {
            $img= Testimonial::where('testi_status', 1)->where('testi_slug', $slug)->firstOrFail();
            $imgName=$img->testi_photo;
        }

        $updator=Auth::user()->id;
        $update=Testimonial::where('testi_status', 1)->where('testi_slug', $slug)->update([
            'testi_name'=>$_POST['name'],
            'testi_desig'=>$_POST['desig'],
            'testi_descrip'=>$_POST['descrip'],
            'testi_photo'=>$imgName,
            'testi_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_testimonial_edit','value');
            return redirect('admin/testimonial/edit/'.$slug);
        } else {
            Session::flash('error_testimonial_edit','value');
            return redirect('admin/testimonial/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Testimonial::where('testi_status',1)->where('testi_slug',$slug)->update([
            'testi_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_testimonial_soft','value');
            return redirect('admin/testimonial');
        }else{
            Session::flash('error_testimonial_soft','value');
            return redirect('admin/testimonial');
        }
      }
}
