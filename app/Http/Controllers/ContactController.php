<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;
use Session;
use App\ContactInfo;
use Auth;
use App\MessageCount;

class ContactController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Contact::where('message_status', 1)->orderBy('message_id', 'DESC')->get();
        return view('admin.message.all-message',compact('all'));
    }

    public function view($slug){
            $msc=MessageCount::where('id',1)->update([
                "count"=>0,
            ]);
        $message=Contact::where('message_status',1)->where('message_slug', $slug)->firstOrFail();
        return view('admin.message.view-message',compact('message'));
    }

    public function soft($slug){
        $soft=Contact::where('message_status',1)->where('message_slug',$slug)->update([
            'message_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_message_soft','value');
            return redirect('admin/message');
        }else{
            Session::flash('error_message_soft','value');
            return redirect('admin/message');
        }
      }

      public function con_info_index(){
        $conin=ContactInfo::where('conin_status', 1)->orderBy('conin_id', 'DESC')->firstOrFail();
        return view('admin.contact.conin',compact('conin'));
    }

    public function con_info_update($slug){

        $updator=Auth::user()->id;

        $update=ContactInfo::where('conin_status', 1)->where('conin_slug', $slug)->update([
            'conin_location'=>$_POST['location'],
            'conin_phone'=>$_POST['phone'],
            'conin_fax'=>$_POST['fax'],
            'conin_email'=>$_POST['email'],
            'conin_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success_conin_edit','value');
            return redirect('admin/conin');
        } else {
            Session::flash('error_conin_edit','value');
            return redirect('admin/conin');
        }
    }
}
