<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResturantCategorey;
use Auth;
use Carbon\Carbon;
use Session;

class ResturantCategoreyController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ResturantCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        return view('admin.resturant-categorey.all-resturant-categorey',compact('all'));
    }

    public function add(){
        return view('admin.resturant-categorey.add-resturant-categorey');
    }

    public function view($slug){
        $cate=ResturantCategorey::where('cate_status',1)->where('cate_slug', $slug)->firstOrFail();
        return view('admin.resturant-categorey.view-resturant-categorey',compact('cate'));
    }

    public function edit($slug){
        $cate=ResturantCategorey::where('cate_status',1)->where('cate_slug', $slug)->firstOrFail();
        return view('admin.resturant-categorey.edit-resturant-categorey',compact('cate'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>'Please Enter a Category Name'
        ]);

        $slug='BLC_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=ResturantCategorey::insert([
            'cate_name'=>$_POST['name'],
            'cate_slug'=>$slug,
            'cate_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_resturant-categorey_upload','value');
            return redirect('admin/resturant-categorey/add');
        } else {
            Session::flash('error_resturant-categorey_upload','value');
            return redirect('admin/resturant-categorey/add');
        }
        
    }

    public function update($slug){
        
        $updator=Auth::user()->id;
        $update=ResturantCategorey::where('cate_status', 1)->where('cate_slug', $slug)->update([
            'cate_name'=>$_POST['name'],
            'cate_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_resturant-categorey_edit','value');
            return redirect('admin/resturant-categorey/edit/'.$slug);
        } else {
            Session::flash('error_resturant-categorey_edit','value');
            return redirect('admin/resturant-categorey/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=ResturantCategorey::where('cate_status',1)->where('cate_slug',$slug)->update([
            'cate_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_resturant-categorey_soft','value');
            return redirect('admin/resturant-categorey');
        }else{
            Session::flash('error_resturant-categorey_soft','value');
            return redirect('admin/resturant-categorey');
        }
      }
}
