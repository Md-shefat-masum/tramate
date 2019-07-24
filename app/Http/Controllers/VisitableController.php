<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitable;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\From;

class VisitableController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Visitable::where('visitable_status', 1)->orderBy('visitable_id', 'DESC')->get();
        return view('admin.visitable.all-visitable',compact('all'));
    }

    public function add(){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        return view('admin.visitable.add-visitable', compact('from'));
    }

    public function view($slug){
        $visitable=Visitable::where('visitable_status',1)->where('visitable_slug', $slug)->firstOrFail();
        return view('admin.visitable.view-visitable',compact('visitable'));
    }

    public function edit($slug){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        $visitable=Visitable::where('visitable_status',1)->where('visitable_slug', $slug)->firstOrFail();
        return view('admin.visitable.edit-visitable',compact('visitable', 'from'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'name'=>'required',
            'details'=>'required',
            'address'=>'required',
            'photo'=>'required',
        ],[
            'from.required'=>'Please Enter The Location',
            'name.required'=>'Please Enter a Name',
            'details.required'=>'Please Enter a Detail',
            'address.required'=>'Please Enter The Address',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='VST_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/visitables/'.$imgName);
        }

        $slug='VST_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Visitable::insert([
            'from_id'=>$_POST['from'],
            'visitable_name'=>$_POST['name'],
            'visitable_details'=>$_POST['details'],
            'visitable_address'=>$_POST['address'],
            'visitable_photo'=>$imgName,
            'visitable_slug'=>$slug,
            'visitable_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_visitable_upload','value');
            return redirect('admin/visitable/add');
        } else {
            Session::flash('error_visitable_upload','value');
            return redirect('admin/visitable/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='VST_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/visitables/'.$imgName);
        }else {
            $img= Visitable::where('visitable_status', 1)->where('visitable_slug', $slug)->firstOrFail();
            $imgName=$img->visitable_photo;
        }

        $updator=Auth::user()->id;
        $update=Visitable::where('visitable_status', 1)->where('visitable_slug', $slug)->update([
            'from_id'=>$_POST['from'],
            'visitable_name'=>$_POST['name'],
            'visitable_details'=>$_POST['details'],
            'visitable_address'=>$_POST['address'],
            'visitable_photo'=>$imgName,
            'visitable_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_visitable_edit','value');
            return redirect('admin/visitable/edit/'.$slug);
        } else {
            Session::flash('error_visitable_edit','value');
            return redirect('admin/visitable/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Visitable::where('visitable_status',1)->where('visitable_slug',$slug)->update([
            'visitable_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_visitable_soft','value');
            return redirect('admin/visitable');
        }else{
            Session::flash('error_visitable_soft','value');
            return redirect('admin/visitable');
        }
      }
}
