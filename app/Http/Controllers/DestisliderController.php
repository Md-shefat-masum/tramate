<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DestinationSlider;
use Image;
use Auth;
use Carbon\Carbon;
use Session;
use App\DestiCate;

class DestisliderController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=DestinationSlider::where('slider_status', 1)->orderBy('slider_id', 'DESC')->get();
        return view('admin.destination-slider.all-slider',compact('all'));
    }

    public function add(){
        $category=DestiCate::where('descate_status',1)->get();
        return view('admin.destination-slider.add-slider',compact('category'));
    }

    public function view($slug){
        $slider=DestinationSlider::where('slider_status',1)->where('slider_slug', $slug)->firstOrFail();
        return view('admin.destination-slider.view-slider',compact('slider'));
    }

    public function edit($slug){
        $slider=DestinationSlider::where('slider_status',1)->where('slider_slug', $slug)->firstOrFail();
        $category=DestiCate::where('descate_status',1)->get();
        return view('admin.destination-slider.edit-slider',compact('slider', 'category'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'price'=>'required',
            'photo'=>'required',
            'category'=>'required',
        ],[
            'title.required'=>'Please Enter a Title',
            'subtitle.required'=>'Please Enter a Subtitle',
            'details.required'=>'Please Enter a Detail',
            'price.required'=>'Please Enter a Price',
            'photo.required'=>'Please Upload a Photo',
            'category.required'=>'Please Select a category',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='DESTI_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(370,250)->save('uploads/desti-sliders/'.$imgName);
        }

        $slug='DESTI_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=DestinationSlider::insert([
            'slider_title'=>$_POST['title'],
            'slider_details'=>$_POST['details'],
            'slider_price'=>$_POST['price'],
            'slider_rate'=>$_POST['rate'],
            'slider_quality'=>$_POST['quality'],
            'slider_visit'=>$_POST['visit'],
            'slider_category'=>$_POST['category'],
            'slider_photo'=>$imgName,
            'slider_slug'=>$slug,
            'slider_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_slider_upload','value');
            return redirect('admin/desti-slider/add');
        } else {
            Session::flash('error_slider_upload','value');
            return redirect('admin/desti-slider/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='BAN_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(370,250)->save('uploads/desti-sliders/'.$imgName);
        }else {
            $img= DestinationSlider::where('slider_status', 1)->where('slider_slug', $slug)->firstOrFail();
            $imgName=$img->slider_photo;
        }

        $updator=Auth::user()->id;
        $update=DestinationSlider::where('slider_status', 1)->where('slider_slug', $slug)->update([
            'slider_title'=>$_POST['title'],
            'slider_details'=>$_POST['details'],
            'slider_price'=>$_POST['price'],
            'slider_rate'=>$_POST['rate'],
            'slider_quality'=>$_POST['quality'],
            'slider_visit'=>$_POST['visit'],
            'slider_category'=>$_POST['category'],
            'slider_photo'=>$imgName,
            'slider_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_slider_edit','value');
            return redirect('admin/desti-slider/edit/'.$slug);
        } else {
            Session::flash('error_slider_edit','value');
            return redirect('admin/desti-slider/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=DestinationSlider::where('slider_status',1)->where('slider_slug',$slug)->update([
            'slider_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_slider_soft','value');
            return redirect('admin/desti-slider');
        }else{
            Session::flash('error_slider_soft','value');
            return redirect('admin/desti-slider');
        }
      }
}
