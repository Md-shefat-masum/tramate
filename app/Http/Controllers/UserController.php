<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Carbon\Carbon;
use Image;
use Session;
use App\UserRole;

class UserController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=User::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.user.all-user',compact('all'));
    }

    public function add(){
        $role=UserRole::where('role_status',1)->get();
        return view('admin.user.add-user',compact('role'));
    }

    public function view($slug){
        $user=User::where('status',1)->where('slug', $slug)->firstOrFail();
        return view('admin.user.view-user',compact('user'));
    }

    public function edit($slug){
        $user=User::where('status',1)->where('slug', $slug)->firstOrFail();
        $role=UserRole::where('role_status',1)->get();
        return view('admin.user.edit-user',compact('user', 'role'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6|max:32|confirmed',
            'role'=>'required',
            'photo'=>'required',
        ],[
            'name.required'=>'Please Enter a Name',
            'email.required'=>'Please Enter Email',
            'role.required'=>'Please Select Role Id',
            'photo.required'=>'Please Upload a Photo',
            'password.required'=>'Please Enter Password',
            'password.confirmed'=>'Password Dose Not Match',
        ]);

        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='USER_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,400)->save('uploads/users/'.$imgName);
        }

        $slug='USER_'.uniqid(2019);
        $creator=Auth::user()->name;
        $insert=User::insert([
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'password'=>Hash::make($_POST['password']),
            'role_id'=>$_POST['role'],
            'photo'=>$imgName,
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_user_insert','value');
            return redirect('admin/user/add');
        } else {
            Session::flash('error_user_insert','value');
            return redirect('admin/user/add');
        }
        
    }

    public function update(Request $request, $slug){
        
        if ($request->hasFile('photo')) {
            $image=$request->file('photo');
            $imgName='USER_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,400)->save('uploads/users/'.$imgName);
        }else {
            $img= User::where('status', 1)->where('slug', $slug)->firstOrFail();
            $imgName=$img->photo;
        }

        if (!empty($request->password)) {
            $pass=Hash::make($_POST['password']);
        } else {
            $passw=User::where('status', 1)->where('slug', $slug)->firstOrFail();
            $pass=$passw->password;
        }
        

        $updator=Auth::user()->name;
        $update=User::where('status', 1)->where('slug', $slug)->update([
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'password'=>$pass,
            'role_id'=>$_POST['role'],
            'photo'=>$imgName,
            'updator'=>$updator,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if ($update) {
            Session::flash('success_user_edit','value');
            return redirect('admin/user/edit/'.$slug);
        } else {
            Session::flash('error_user_edit','value');
            return redirect('admin/user/edit/'.$slug);
        }

        //how to delete a file from directory using file name in laravel
        
    }

    public function soft($slug){
        $soft=User::where('status',1)->where('slug',$slug)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_user_soft','value');
            return redirect('admin/user');
        }else{
            Session::flash('error_user_soft','value');
            return redirect('admin/user');
        }
      }
}
