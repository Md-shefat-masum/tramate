<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotels;
use Auth;
use Carbon\Carbon;
use Session;
use App\From;
use App\Service;

class HotelController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Hotels::where('hotel_status', 1)->orderBy('hotel_id', 'DESC')->get();
        return view('admin.hotels.all-hotels',compact('all'));
    }

    public function add(){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        $service=Service::where('service_status', 1)->orderBy('service_id', 'DESC')->get();
        return view('admin.hotels.add-hotels', compact('from', 'service'));
    }

    public function view($slug){
        $hotels=Hotels::where('hotel_status',1)->where('hotel_slug', $slug)->firstOrFail();
        return view('admin.hotels.view-hotels',compact('hotels'));
    }

    public function edit($slug){
        $from=From::where('from_status', 1)->orderBy('from_id', 'DESC')->get();
        $service=Service::where('service_status', 1)->orderBy('service_id', 'DESC')->get();
        $hotels=Hotels::where('hotel_status',1)->where('hotel_slug', $slug)->firstOrFail();
        return view('admin.hotels.edit-hotels',compact('hotels', 'service', 'from'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'from'=>'required',
            'service'=>'required',
            'details'=>'required',
            'star'=>'required',
            'food'=>'required',
            'price'=>'required',
            'address'=>'required',
            'contact'=>'required',
        ],[
            'from.required'=>'Please Enter The Location',
            'service.required'=>'Please Enter a Hotel Name',
            'details.required'=>'Please Enter a Detail',
            'star.required'=>'Please Enter The type of the hotel',
            'food.required'=>'Please Enter The Food Status',
            'price.required'=>'Please Enter a Price',
            'address.required'=>'Please Enter The Address',
            'contact.required'=>'Please Enter The contact',
        ]);

        $slug='HTL_'.uniqid(2019);
        $uploader=Auth::user()->id;
        $insert=Hotels::insert([
            'from_id'=>$_POST['from'],
            'hotel_name'=>$_POST['service'],
            'hotel_details'=>$_POST['details'],
            'hotel_star'=>$_POST['star'],
            'hotel_food_status'=>$_POST['food'],
            'hotel_price'=>$_POST['price'],
            'hotel_address'=>$_POST['address'],
            'hotel_contact'=>$_POST['contact'],
            'hotel_slug'=>$slug,
            'hotel_uploader'=>$uploader,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_hotels_upload','value');
            return redirect('admin/hotels/add');
        } else {
            Session::flash('error_hotels_upload','value');
            return redirect('admin/hotels/add');
        }
        
    }

    public function update($slug){
        
        $updator=Auth::user()->id;
        $update=Hotels::where('hotel_status', 1)->where('hotel_slug', $slug)->update([
            'from_id'=>$_POST['from'],
            'hotel_name'=>$_POST['service'],
            'hotel_details'=>$_POST['details'],
            'hotel_star'=>$_POST['star'],
            'hotel_food_status'=>$_POST['food'],
            'hotel_price'=>$_POST['price'],
            'hotel_address'=>$_POST['address'],
            'hotel_contact'=>$_POST['contact'],
            'hotel_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_hotels_edit','value');
            return redirect('admin/hotels/edit/'.$slug);
        } else {
            Session::flash('error_hotels_edit','value');
            return redirect('admin/hotels/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=Hotels::where('hotel_status',1)->where('hotel_slug',$slug)->update([
            'hotel_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_hotels_soft','value');
            return redirect('admin/hotels');
        }else{
            Session::flash('error_hotels_soft','value');
            return redirect('admin/hotels');
        }
      }
}
