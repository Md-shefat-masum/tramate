<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Image;
use Session;
use Auth;
use Carbon\Carbon;

class BannerController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Banner::where('ban_status', 1)->orderBy('ban_id', 'DESC')->get();
        return view('admin.banner.all-banner',compact('all'));
    }

    public function add(){
        return view('admin.banner.add-banner');
    }

    public function view($slug){
        $banner=Banner::where('ban_status',1)->where('ban_slug', $slug)->firstOrFail();
        return view('admin.banner.view-banner',compact('banner'));
    }

    public function edit($slug){
        $banner=Banner::where('ban_status',1)->where('ban_slug', $slug)->firstOrFail();
        return view('admin.banner.edit-banner',compact('banner'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'details'=>'required',
            'btn1'=>'required',
            'url1'=>'required',
            'btn2'=>'required',
            'url2'=>'required',
            'photo'=>'required',
        ],[
            'title.required'=>'Please Enter a Title',
            'subtitle.required'=>'Please Enter a Subtitle',
            'details.required'=>'Please Enter a Detail',
            'btn1.required'=>'At Least Write Comming Soon',
            'url1.required'=>'At Least Enter #',
            'btn2.required'=>'At Least Write Comming Soon',
            'url2.required'=>'At Least Enter #',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='BAN_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/banners/'.$imgName);
        }

        $slug='BAN_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Banner::insert([
            'ban_title'=>$_POST['title'],
            'ban_subtitle'=>$_POST['subtitle'],
            'ban_details'=>$_POST['details'],
            'ban_btn1'=>$_POST['btn1'],
            'ban_url1'=>$_POST['url1'],
            'ban_btn2'=>$_POST['btn2'],
            'ban_url2'=>$_POST['url2'],
            'ban_photo'=>$imgName,
            'ban_slug'=>$slug,
            'ban_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_banner_upload','value');
            return redirect('admin/banner/add');
        } else {
            Session::flash('error_banner_upload','value');
            return redirect('admin/banner/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='BAN_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/banners/'.$imgName);
        }else {
            $img= Banner::where('ban_status', 1)->where('ban_slug', $slug)->firstOrFail();
            $imgName=$img->ban_photo;
        }

        $updator=Auth::user()->id;
        $update=Banner::where('ban_status', 1)->where('ban_slug', $slug)->update([
            'ban_title'=>$_POST['title'],
            'ban_subtitle'=>$_POST['subtitle'],
            'ban_details'=>$_POST['details'],
            'ban_btn1'=>$_POST['btn1'],
            'ban_url1'=>$_POST['url1'],
            'ban_btn2'=>$_POST['btn2'],
            'ban_url2'=>$_POST['url2'],
            'ban_photo'=>$imgName,
            'ban_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_banner_edit','value');
            return redirect('admin/banner/edit/'.$slug);
        } else {
            Session::flash('error_banner_edit','value');
            return redirect('admin/banner/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Banner::where('ban_status',1)->where('ban_slug',$slug)->update([
            'ban_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_banner_soft','value');
            return redirect('admin/banner');
        }else{
            Session::flash('error_banner_soft','value');
            return redirect('admin/banner');
        }
      }
}
