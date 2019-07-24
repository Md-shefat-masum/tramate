<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChooseUs;
use Image;
use Auth;
use Carbon\Carbon;
use Session;

class WhyChooseController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ChooseUs::where('choose_status', 1)->orderBy('choose_id', 'DESC')->get();
        return view('admin.why-choose-us.all-choose',compact('all'));
    }

    public function add(){
        return view('admin.why-choose-us.add-choose');
    }

    public function view($slug){
        $choose=ChooseUs::where('choose_status',1)->where('choose_slug', $slug)->firstOrFail();
        return view('admin.why-choose-us.view-choose',compact('choose'));
    }

    public function edit($slug){
        $choose=ChooseUs::where('choose_status',1)->where('choose_slug', $slug)->firstOrFail();
        return view('admin.why-choose-us.edit-choose',compact('choose'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'li1'=>'required',
            'li2'=>'required',
            'li3'=>'required',
            'li4'=>'required',
            'btn1'=>'required',
            'url1'=>'required',
            'btn2'=>'required',
            'url2'=>'required',
            'photo'=>'required',
        ],[
            'title.required'=>'Please Enter a Title',
            'details.required'=>'Please Enter a Detail',
            'li1.required'=>'Please Enter List 1',
            'li2.required'=>'Please Enter List 2',
            'li3.required'=>'Please Enter List 3',
            'li4.required'=>'Please Enter List 4',
            'btn1.required'=>'At Least Write Comming Soon',
            'url1.required'=>'At Least Enter #',
            'btn2.required'=>'At Least Write Comming Soon',
            'url2.required'=>'At Least Enter #',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='CHU_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(540,410)->save('uploads/chooses/'.$imgName);
        }

        $slug='CHU_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=ChooseUs::insert([
            'choose_title'=>$_POST['title'],
            'choose_details'=>$_POST['details'],
            'choose_li1'=>$_POST['li1'],
            'choose_li2'=>$_POST['li2'],
            'choose_li3'=>$_POST['li3'],
            'choose_li4'=>$_POST['li4'],
            'choose_btn1'=>$_POST['btn1'],
            'choose_url1'=>$_POST['url1'],
            'choose_btn2'=>$_POST['btn2'],
            'choose_url2'=>$_POST['url2'],
            'choose_photo'=>$imgName,
            'choose_slug'=>$slug,
            'choose_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_choose_upload','value');
            return redirect('admin/choose-us/add');
        } else {
            Session::flash('error_choose_upload','value');
            return redirect('admin/choose-us/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='CHU_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(540,410)->save('uploads/chooses/'.$imgName);
        }else {
            $img= ChooseUs::where('choose_status', 1)->where('choose_slug', $slug)->firstOrFail();
            $imgName=$img->choose_photo;
        }

        $updator=Auth::user()->id;
        $update=ChooseUs::where('choose_status', 1)->where('choose_slug', $slug)->update([
            'choose_title'=>$_POST['title'],
            'choose_details'=>$_POST['details'],
            'choose_li1'=>$_POST['li1'],
            'choose_li2'=>$_POST['li2'],
            'choose_li3'=>$_POST['li3'],
            'choose_li4'=>$_POST['li4'],
            'choose_btn1'=>$_POST['btn1'],
            'choose_url1'=>$_POST['url1'],
            'choose_btn2'=>$_POST['btn2'],
            'choose_url2'=>$_POST['url2'],
            'choose_photo'=>$imgName,
            'choose_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_choose_edit','value');
            return redirect('admin/choose-us/edit/'.$slug);
        } else {
            Session::flash('error_choose_edit','value');
            return redirect('admin/choose-us/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=ChooseUs::where('choose_status',1)->where('choose_slug',$slug)->update([
            'choose_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_choose_soft','value');
            return redirect('admin/choose-us');
        }else{
            Session::flash('error_choose_soft','value');
            return redirect('admin/choose-us');
        }
      }
}
