<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Image;
use Auth;
use Carbon\Carbon;
use Session;
use App\BlogCategorey;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Blog::where('blog_status', 1)->orderBy('blog_id', 'DESC')->get();
        return view('admin.blog.all-blog',compact('all'));
    }

    public function add(){
        $cate=BlogCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        return view('admin.blog.add-blog', compact('cate'));
    }

    public function view($slug){
        $blog=Blog::where('blog_status',1)->where('blog_slug', $slug)->firstOrFail();
        return view('admin.blog.view-blog',compact('blog'));
    }

    public function edit($slug){
        $cate=BlogCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        $blog=Blog::where('blog_status',1)->where('blog_slug', $slug)->firstOrFail();
        return view('admin.blog.edit-blog',compact('blog', 'cate'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'cate'=>'required',
            'photo'=>'required',
        ],[
            'title.required'=>'Please Enter a Title',
            'details.required'=>'Please Enter a Detail',
            'cate.required'=>'Please Select a Category',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='BLG_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(850,400)->save('uploads/blogs/'.$imgName);
        }

        $slug='BLG_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $role=Auth::user()->role_id;
        $insert=Blog::insert([
            'blog_title'=>$_POST['title'],
            'blog_details'=>$_POST['details'],
            'blog_cate_id'=>$_POST['cate'],
            'blog_photo'=>$imgName,
            'blog_slug'=>$slug,
            'blog_role_id'=>$role,
            'blog_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_blog_upload','value');
            return redirect('admin/blog/add');
        } else {
            Session::flash('error_blog_upload','value');
            return redirect('admin/blog/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='BLG_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(850,400)->save('uploads/blogs/'.$imgName);
        }else {
            $img= Blog::where('blog_status', 1)->where('blog_slug', $slug)->firstOrFail();
            $imgName=$img->blog_photo;
        }

        $updator=Auth::user()->id;
        $update=Blog::where('blog_status', 1)->where('blog_slug', $slug)->update([
            'blog_title'=>$_POST['title'],
            'blog_details'=>$_POST['details'],
            'blog_cate_id'=>$_POST['cate'],
            'blog_photo'=>$imgName,
            'blog_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_blog_edit','value');
            return redirect('admin/blog/edit/'.$slug);
        } else {
            Session::flash('error_blog_edit','value');
            return redirect('admin/blog/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Blog::where('blog_status',1)->where('blog_slug',$slug)->update([
            'blog_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_blog_soft','value');
            return redirect('admin/blog');
        }else{
            Session::flash('error_blog_soft','value');
            return redirect('admin/blog');
        }
      }
}
