<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use Image;
use Auth;
use Carbon\Carbon;
use Session;

class TourController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Tour::where('tour_status', 1)->orderBy('tour_id', 'DESC')->get();
        return view('admin.tour.all-tour',compact('all'));
    }

    public function add(){
        return view('admin.tour.add-tour');
    }

    public function view($slug){
        $tour=Tour::where('tour_status',1)->where('tour_slug', $slug)->firstOrFail();
        return view('admin.tour.view-tour',compact('tour'));
    }

    public function edit($slug){
        $tour=Tour::where('tour_status',1)->where('tour_slug', $slug)->firstOrFail();
        return view('admin.tour.edit-tour',compact('tour'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            //'oldprice'=>'required',
            'btn'=>'required',
            'url'=>'required',
            'photo'=>'required',
        ],[
            'name.required'=>'Please Enter a Name',
            'price.required'=>'Please Enter Price',
            //'oldprice.required'=>'At Least Write 0',
            'btn.required'=>'At Least Write Comming Soon',
            'url.required'=>'At Least Enter #',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='TOUR_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(350,250)->save('uploads/tours/'.$imgName);
        }

        $slug='TOUR_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Tour::insert([
            'tour_name'=>$_POST['name'],
            'tour_price'=>$_POST['price'],
            'tour_oldprice'=>$_POST['oldprice'],
            'tour_btn'=>$_POST['btn'],
            'tour_url'=>$_POST['url'],
            'tour_photo'=>$imgName,
            'tour_slug'=>$slug,
            'tour_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_tour_upload','value');
            return redirect('admin/tour/add');
        } else {
            Session::flash('error_tour_upload','value');
            return redirect('admin/tour/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='TOUR_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(350,250)->save('uploads/tours/'.$imgName);
        }else {
            $img= Tour::where('tour_status', 1)->where('tour_slug', $slug)->firstOrFail();
            $imgName=$img->tour_photo;
        }

        $updator=Auth::user()->id;
        $update=Tour::where('tour_status', 1)->where('tour_slug', $slug)->update([
            'tour_name'=>$_POST['name'],
            'tour_price'=>$_POST['price'],
            'tour_oldprice'=>$_POST['oldprice'],
            'tour_btn'=>$_POST['btn'],
            'tour_url'=>$_POST['url'],
            'tour_photo'=>$imgName,
            'tour_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_tour_edit','value');
            return redirect('admin/tour/edit/'.$slug);
        } else {
            Session::flash('error_tour_edit','value');
            return redirect('admin/tour/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Tour::where('tour_status',1)->where('tour_slug',$slug)->update([
            'tour_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_tour_soft','value');
            return redirect('admin/tour');
        }else{
            Session::flash('error_tour_soft','value');
            return redirect('admin/tour');
        }
      }
}
