<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counter;
use Auth;
use Carbon\Carbon;
use Session;

class CounterController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $counter=Counter::where('counter_status', 1)->orderBy('counter_id', 'DESC')->firstOrFail();
        return view('admin.counter.counter',compact('counter'));
    }

    public function update($slug){

        $updator=Auth::user()->id;

        $update=Counter::where('counter_status', 1)->where('counter_slug', $slug)->update([
            'counter_tourist'=>$_POST['tourist'],
            'counter_tour'=>$_POST['tour'],
            'counter_guide'=>$_POST['guide'],
            'counter_supported'=>$_POST['support'],
            'counter_updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success_counter_edit','value');
            return redirect('admin/counter');
        } else {
            Session::flash('error_counter_edit','value');
            return redirect('admin/counter');
        }
    }

}
