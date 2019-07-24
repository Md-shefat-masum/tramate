<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Auth;
use Session;
use Carbon\Carbon;

class PlanController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Plan::where('plan_status', 1)->orderBy('plan_id', 'DESC')->get();
        return view('admin.plan.all-plan',compact('all'));
    }

    public function add(){
        return view('admin.plan.add-plan');
    }

    public function view($slug){
        $plan=Plan::where('plan_status',1)->where('plan_slug', $slug)->firstOrFail();
        return view('admin.plan.view-plan',compact('plan'));
    }

    public function edit($slug){
        $plan=Plan::where('plan_status',1)->where('plan_slug', $slug)->firstOrFail();
        return view('admin.plan.edit-plan',compact('plan'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'title'=>'required',
            /* 'li1'=>'required',
            'li2'=>'required',
            'li3'=>'required',
            'li4'=>'required',
            'li5'=>'required', */
            'btn'=>'required',
            'url'=>'required',
        ],[
            'title.required'=>'Please Enter a Title',
            /* 'li1.required'=>'Please Enter a List',
            'li2.required'=>'Please Enter a List',
            'li3.required'=>'Please Enter a List',
            'li4.required'=>'Please Enter a List',
            'li5.required'=>'Please Enter a List', */
            'btn.required'=>'At Least Write Comming Soon',
            'url.required'=>'At Least Enter #',
        ]);

        $slug='PLN_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Plan::insert([
            'plan_title'=>$_POST['title'],
            'plan_li1'=>$_POST['li1'],
            'plan_li2'=>$_POST['li2'],
            'plan_li3'=>$_POST['li3'],
            'plan_li4'=>$_POST['li4'],
            'plan_li5'=>$_POST['li5'],
            'plan_btn'=>$_POST['btn'],
            'plan_url'=>$_POST['url'],
            'plan_price'=>$_POST['price'],
            'plan_slug'=>$slug,
            'plan_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_plan_upload','value');
            return redirect('admin/plan/add');
        } else {
            Session::flash('error_plan_upload','value');
            return redirect('admin/plan/add');
        }
        
    }

    public function update(Request $request, $slug){

        $updator=Auth::user()->id;
        $update=Plan::where('plan_status', 1)->where('plan_slug', $slug)->update([
            'plan_title'=>$_POST['title'],
            'plan_li1'=>$_POST['li1'],
            'plan_li2'=>$_POST['li2'],
            'plan_li3'=>$_POST['li3'],
            'plan_li4'=>$_POST['li4'],
            'plan_li5'=>$_POST['li5'],
            'plan_btn'=>$_POST['btn'],
            'plan_url'=>$_POST['url'],
            'plan_price'=>$_POST['price'],
            'plan_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_plan_edit','value');
            return redirect('admin/plan/edit/'.$slug);
        } else {
            Session::flash('error_plan_edit','value');
            return redirect('admin/plan/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Plan::where('plan_status',1)->where('plan_slug',$slug)->update([
            'plan_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_plan_soft','value');
            return redirect('admin/plan');
        }else{
            Session::flash('error_plan_soft','value');
            return redirect('admin/plan');
        }
      }
}
