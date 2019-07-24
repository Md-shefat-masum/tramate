<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Image;
use Auth;
use Carbon\Carbon;
use Session;

class GalleryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Gallery::where('gallery_status', 1)->orderBy('gallery_id', 'DESC')->get();
        return view('admin.gallery.all-gallery',compact('all'));
    }

    public function add(){
        return view('admin.gallery.add-gallery');
    }

    public function view($slug){
        $gallery=Gallery::where('gallery_status',1)->where('gallery_slug', $slug)->firstOrFail();
        return view('admin.gallery.view-gallery',compact('gallery'));
    }

    public function edit($slug){
        $gallery=Gallery::where('gallery_status',1)->where('gallery_slug', $slug)->firstOrFail();
        return view('admin.gallery.edit-gallery',compact('gallery'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'photo'=>'required',
        ],[
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='GLY_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(350,280)->save('uploads/gallerys/'.$imgName);
        }

        $slug='GLY_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Gallery::insert([
            'gallery_views'=>$_POST['views'],
            'gallery_comments'=>$_POST['comments'],
            'gallery_photo'=>$imgName,
            'gallery_slug'=>$slug,
            'gallery_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_gallery_upload','value');
            return redirect('admin/gallery/add');
        } else {
            Session::flash('error_gallery_upload','value');
            return redirect('admin/gallery/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='GLY_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(350,280)->save('uploads/gallerys/'.$imgName);
        }else {
            $img= Gallery::where('gallery_status', 1)->where('gallery_slug', $slug)->firstOrFail();
            $imgName=$img->gallery_photo;
        }

        $updator=Auth::user()->id;
        $update=Gallery::where('gallery_status', 1)->where('gallery_slug', $slug)->update([
            'gallery_views'=>$_POST['views'],
            'gallery_comments'=>$_POST['comments'],
            'gallery_photo'=>$imgName,
            'gallery_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_gallery_edit','value');
            return redirect('admin/gallery/edit/'.$slug);
        } else {
            Session::flash('error_gallery_edit','value');
            return redirect('admin/gallery/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Gallery::where('gallery_status',1)->where('gallery_slug',$slug)->update([
            'gallery_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_gallery_soft','value');
            return redirect('admin/gallery');
        }else{
            Session::flash('error_gallery_soft','value');
            return redirect('admin/gallery');
        }
      }
}
