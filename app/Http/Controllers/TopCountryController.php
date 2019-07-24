<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopCountry;
use Image;
use Auth;
use Carbon\Carbon;
use Session;

class TopCountryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=TopCountry::where('country_status', 1)->orderBy('country_id', 'DESC')->get();
        return view('admin.top-country.all-country',compact('all'));
    }

    public function add(){
        return view('admin.top-country.add-country');
    }

    public function view($slug){
        $country=TopCountry::where('country_status',1)->where('country_slug', $slug)->firstOrFail();
        return view('admin.top-country.view-country',compact('country'));
    }

    public function edit($slug){
        $country=TopCountry::where('country_status',1)->where('country_slug', $slug)->firstOrFail();
        return view('admin.top-country.edit-country',compact('country'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'tour'=>'required',
            'photo'=>'required',
        ],[
            'name.required'=>'Please Enter a Country Name',
            'tour.required'=>'Please Enter a Tour package',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='TCV_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/countrys/'.$imgName);
        }

        $slug='TCV_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=TopCountry::insert([
            'country_name'=>$_POST['name'],
            'country_tour'=>$_POST['tour'],
            'country_reviews'=>$_POST['reviews'],
            'country_rating'=>$_POST['rating'],
            'country_photo'=>$imgName,
            'country_slug'=>$slug,
            'country_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_country_upload','value');
            return redirect('admin/top-country/add');
        } else {
            Session::flash('error_country_upload','value');
            return redirect('admin/top-country/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='TCV_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/countrys/'.$imgName);
        }else {
            $img= TopCountry::where('country_status', 1)->where('country_slug', $slug)->firstOrFail();
            $imgName=$img->country_photo;
        }

        $updator=Auth::user()->id;
        $update=TopCountry::where('country_status', 1)->where('country_slug', $slug)->update([
            'country_name'=>$_POST['name'],
            'country_tour'=>$_POST['tour'],
            'country_reviews'=>$_POST['reviews'],
            'country_rating'=>$_POST['rating'],
            'country_photo'=>$imgName,
            'country_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_country_edit','value');
            return redirect('admin/top-country/edit/'.$slug);
        } else {
            Session::flash('error_country_edit','value');
            return redirect('admin/top-country/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=TopCountry::where('country_status',1)->where('country_slug',$slug)->update([
            'country_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_country_soft','value');
            return redirect('admin/top-country');
        }else{
            Session::flash('error_country_soft','value');
            return redirect('admin/top-country');
        }
      }
}
