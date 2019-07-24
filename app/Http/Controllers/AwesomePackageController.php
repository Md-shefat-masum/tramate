<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AwesomePackage;
use Image;
use Auth;
use Carbon\Carbon;
use Session;

class AwesomePackageController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=AwesomePackage::where('awesome_status', 1)->orderBy('awesome_id', 'DESC')->get();
        return view('admin.awesome-package.all-package',compact('all'));
    }

    public function add(){
        return view('admin.awesome-package.add-package');
    }

    public function view($slug){
        $awesome=AwesomePackage::where('awesome_status',1)->where('awesome_slug', $slug)->firstOrFail();
        return view('admin.awesome-package.view-package',compact('awesome'));
    }

    public function edit($slug){
        $awesome=AwesomePackage::where('awesome_status',1)->where('awesome_slug', $slug)->firstOrFail();
        return view('admin.awesome-package.edit-package',compact('awesome'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'place'=>'required',
            'date'=>'required',
            'photo'=>'required',
        ],[
            'title.required'=>'Please Enter a Title',
            'details.required'=>'Please Enter a Detail',
            'place.required'=>'Please Enter The Place',
            'date.required'=>'Please Enter Date',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='AWP_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/awesomes/'.$imgName);
        }

        $slug='AWP_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=AwesomePackage::insert([
            'awesome_title'=>$_POST['title'],
            'awesome_details'=>$_POST['details'],
            'awesome_place'=>$_POST['place'],
            'awesome_date'=>$_POST['date'],
            'awesome_photo'=>$imgName,
            'awesome_slug'=>$slug,
            'awesome_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_awesome_upload','value');
            return redirect('admin/awesome-package/add');
        } else {
            Session::flash('error_awesome_upload','value');
            return redirect('admin/awesome-package/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='AWP_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/awesomes/'.$imgName);
        }else {
            $img= AwesomePackage::where('awesome_status', 1)->where('awesome_slug', $slug)->firstOrFail();
            $imgName=$img->awesome_photo;
        }

        $updator=Auth::user()->id;
        $update=AwesomePackage::where('awesome_status', 1)->where('awesome_slug', $slug)->update([
            'awesome_title'=>$_POST['title'],
            'awesome_details'=>$_POST['details'],
            'awesome_place'=>$_POST['place'],
            'awesome_date'=>$_POST['date'],
            'awesome_photo'=>$imgName,
            'awesome_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_awesome_edit','value');
            return redirect('admin/awesome-package/edit/'.$slug);
        } else {
            Session::flash('error_awesome_edit','value');
            return redirect('admin/awesome-package/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=AwesomePackage::where('awesome_status',1)->where('awesome_slug',$slug)->update([
            'awesome_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_awesome_soft','value');
            return redirect('admin/awesome-package');
        }else{
            Session::flash('error_awesome_soft','value');
            return redirect('admin/awesome-package');
        }
      }
}
