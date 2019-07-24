<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Image;
use Auth;
use Carbon\Carbon;
use Session;

class MemberController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Member::where('member_status', 1)->orderBy('member_id', 'DESC')->get();
        return view('admin.member.all-member',compact('all'));
    }

    public function add(){
        return view('admin.member.add-member');
    }

    public function view($slug){
        $member=Member::where('member_status',1)->where('member_slug', $slug)->firstOrFail();
        return view('admin.member.view-member',compact('member'));
    }

    public function edit($slug){
        $member=Member::where('member_status',1)->where('member_slug', $slug)->firstOrFail();
        return view('admin.member.edit-member',compact('member'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'desig'=>'required',
            'url1'=>'required',
            'url2'=>'required',
            'url3'=>'required',
            'url4'=>'required',
            'photo'=>'required',
        ],[
            'name.required'=>'Please Enter a Name',
            'subtitle.required'=>'Please Enter a Designation',
            'url1.required'=>'At Least Enter #',
            'url2.required'=>'At Least Enter #',
            'url3.required'=>'At Least Enter #',
            'url4.required'=>'At Least Enter #',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='MEM_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(255,280)->save('uploads/members/'.$imgName);
        }

        $slug='MEM_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Member::insert([
            'member_name'=>$_POST['name'],
            'member_desig'=>$_POST['desig'],
            'member_url1'=>$_POST['url1'],
            'member_url2'=>$_POST['url2'],
            'member_url3'=>$_POST['url3'],
            'member_url4'=>$_POST['url4'],
            'member_photo'=>$imgName,
            'member_slug'=>$slug,
            'member_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_member_upload','value');
            return redirect('admin/member/add');
        } else {
            Session::flash('error_member_upload','value');
            return redirect('admin/member/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='MEM_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(255,280)->save('uploads/members/'.$imgName);
        }else {
            $img= Member::where('member_status', 1)->where('member_slug', $slug)->firstOrFail();
            $imgName=$img->member_photo;
        }

        $updator=Auth::user()->id;
        $update=Member::where('member_status', 1)->where('member_slug', $slug)->update([
            'member_name'=>$_POST['name'],
            'member_desig'=>$_POST['desig'],
            'member_url1'=>$_POST['url1'],
            'member_url2'=>$_POST['url2'],
            'member_url3'=>$_POST['url3'],
            'member_url4'=>$_POST['url4'],
            'member_photo'=>$imgName,
            'member_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_member_edit','value');
            return redirect('admin/member/edit/'.$slug);
        } else {
            Session::flash('error_member_edit','value');
            return redirect('admin/member/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Member::where('member_status',1)->where('member_slug',$slug)->update([
            'member_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_member_soft','value');
            return redirect('admin/member');
        }else{
            Session::flash('error_member_soft','value');
            return redirect('admin/member');
        }
      }
}
