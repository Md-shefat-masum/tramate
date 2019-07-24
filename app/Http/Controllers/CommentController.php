<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Comment::where('comment_status', 1)->orderBy('comment_id', 'DESC')->get();
        return view('admin.comment.all-comment',compact('all'));
    }

    public function view($slug){
        $comment=Comment::where('comment_status',1)->where('comment_slug', $slug)->firstOrFail();
        return view('admin.comment.view-comment',compact('comment'));
    }

    public function soft($slug){
        $soft=Comment::where('comment_status',1)->where('comment_slug',$slug)->update([
            'comment_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
  
        if($soft){
            Session::flash('success_comment_soft','value');
            return redirect('admin/comment');
        }else{
            Session::flash('error_comment_soft','value');
            return redirect('admin/comment');
        }
      }

      

}
