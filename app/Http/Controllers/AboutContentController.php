<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutContent;
use Auth;
use Carbon\Carbon;
use Session;
use Image;

class AboutContentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $abc=AboutContent::where('abc_status', 1)->orderBy('abc_id', 'DESC')->firstOrFail();
        return view('admin.about-content.about-content',compact('abc'));
    }

    public function update(Request $request, $slug){

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='ABC_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(540,360)->save('uploads/about-contents/'.$imgName);
        }else {
            $img= AboutContent::where('abc_status', 1)->where('abc_slug', $slug)->firstOrFail();
            $imgName=$img->abc_photo;
        }

        $updator=Auth::user()->id;

        $update=AboutContent::where('abc_status', 1)->where('abc_slug', $slug)->update([
            'abc_title'=>$_POST['title'],
            'abc_details'=>$_POST['details'],
            'abc_photo'=>$imgName,
            'abc_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success_about-content_edit','value');
            return redirect('admin/about-content');
        } else {
            Session::flash('error_about-content_edit','value');
            return redirect('admin/about-content');
        }
    }
}
