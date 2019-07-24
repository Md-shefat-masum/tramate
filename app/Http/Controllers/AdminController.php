<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\MessageCount;

class AdminController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.dashboard.dashboard');
    }

    public function message(){
        return view('layouts.admin',compact('all'));
    }
}
