<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategorey;
use Auth;
use Carbon\Carbon;
use Session;

class BlogCategoreyController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=BlogCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        return view('admin.blog-categorey.all-blog-categorey',compact('all'));
    }

    public function add(){
        return view('admin.blog-categorey.add-blog-categorey');
    }

    public function view($slug){
        $cate=BlogCategorey::where('cate_status',1)->where('cate_slug', $slug)->firstOrFail();
        return view('admin.blog-categorey.view-blog-categorey',compact('cate'));
    }

    public function edit($slug){
        $cate=BlogCategorey::where('cate_status',1)->where('cate_slug', $slug)->firstOrFail();
        return view('admin.blog-categorey.edit-blog-categorey',compact('cate'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>'Please Enter a Category Name'
        ]);

        $slug='BLC_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=BlogCategorey::insert([
            'cate_name'=>$_POST['name'],
            'cate_slug'=>$slug,
            'cate_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_blog-categorey_upload','value');
            return redirect('admin/blog-categorey/add');
        } else {
            Session::flash('error_blog-categorey_upload','value');
            return redirect('admin/blog-categorey/add');
        }
        
    }

    public function update($slug){
        
        $updator=Auth::user()->id;
        $update=BlogCategorey::where('cate_status', 1)->where('cate_slug', $slug)->update([
            'cate_name'=>$_POST['name'],
            'cate_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_blog-categorey_edit','value');
            return redirect('admin/blog-categorey/edit/'.$slug);
        } else {
            Session::flash('error_blog-categorey_edit','value');
            return redirect('admin/blog-categorey/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=BlogCategorey::where('cate_status',1)->where('cate_slug',$slug)->update([
            'cate_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_blog-categorey_soft','value');
            return redirect('admin/blog-categorey');
        }else{
            Session::flash('error_blog-categorey_soft','value');
            return redirect('admin/blog-categorey');
        }
      }
}
