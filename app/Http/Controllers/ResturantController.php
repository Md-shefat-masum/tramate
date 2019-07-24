<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resturant;
use Image;
use Auth;
use Carbon\Carbon;
use Session;
use App\From;
use App\ResturantCategorey;

class ResturantController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Resturant::where('resturant_status', 1)->orderBy('resturant_id', 'DESC')->get();
        return view('admin.resturant.all-resturant',compact('all'));
    }

    public function add(){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        $cate=ResturantCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        return view('admin.resturant.add-resturant', compact('from', 'cate'));
    }

    public function view($slug){
        $resturant=Resturant::where('resturant_status',1)->where('resturant_slug', $slug)->firstOrFail();
        return view('admin.resturant.view-resturant',compact('resturant'));
    }

    public function edit($slug){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        $cate=ResturantCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        $resturant=Resturant::where('resturant_status',1)->where('resturant_slug', $slug)->firstOrFail();
        return view('admin.resturant.edit-resturant', compact('resturant', 'cate', 'from'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'name'=>'required',
            'details'=>'required',
            'cate'=>'required',
            'lowest'=>'required',
            'highest'=>'required',
            'address'=>'required',
            'photo'=>'required',
        ],[
            'from.required'=>'Please Enter The Location',
            'name.required'=>'Please Enter a Name',
            'details.required'=>'Please Enter a Detail',
            'cate.required'=>'Please Enter a Categorey',
            'lowest.required'=>'Please Enter The Lowest Price',
            'highest.required'=>'Please Enter The Highest',
            'address.required'=>'Please Enter The Address',
            'photo.required'=>'Please Upload a Photo',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='RST_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/resturants/'.$imgName);
        }

        $slug='RST_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Resturant::insert([
            'from_id'=>$_POST['from'],
            'resturant_name'=>$_POST['name'],
            'resturant_details'=>$_POST['details'],
            'cate_id'=>$_POST['cate'],
            'resturant_lowest_rate'=>$_POST['lowest'],
            'resturant_highest_rate'=>$_POST['highest'],
            'resturant_address'=>$_POST['address'],
            'resturant_photo'=>$imgName,
            'resturant_slug'=>$slug,
            'resturant_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_resturant_upload','value');
            return redirect('admin/resturant/add');
        } else {
            Session::flash('error_resturant_upload','value');
            return redirect('admin/resturant/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='RST_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('uploads/resturants/'.$imgName);
        }else {
            $img= Resturant::where('resturant_status', 1)->where('resturant_slug', $slug)->firstOrFail();
            $imgName=$img->resturant_photo;
        }

        $updator=Auth::user()->id;
        $update=Resturant::where('resturant_status', 1)->where('resturant_slug', $slug)->update([
            'from_id'=>$_POST['from'],
            'resturant_name'=>$_POST['name'],
            'resturant_details'=>$_POST['details'],
            'cate_id'=>$_POST['cate'],
            'resturant_lowest_rate'=>$_POST['lowest'],
            'resturant_highest_rate'=>$_POST['highest'],
            'resturant_address'=>$_POST['address'],
            'resturant_photo'=>$imgName,
            'resturant_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_resturant_edit','value');
            return redirect('admin/resturant/edit/'.$slug);
        } else {
            Session::flash('error_resturant_edit','value');
            return redirect('admin/resturant/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Resturant::where('resturant_status',1)->where('resturant_slug',$slug)->update([
            'resturant_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_resturant_soft','value');
            return redirect('admin/resturant');
        }else{
            Session::flash('error_resturant_soft','value');
            return redirect('admin/resturant');
        }
      }
}
