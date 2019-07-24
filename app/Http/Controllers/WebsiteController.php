<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\DestinationSlider;
use App\ChooseUs;
use App\TopCountry;
use App\AwesomePackage;
use App\Counter;
use App\Gallery;
use App\Testimonial;
use Carbon\Carbon;
use Session;
use App\Contact;
use App\ContactInfo;
use App\AboutContent;
use App\Member;
use App\Tour;
use App\Plan;
use App\Blog;
use App\BlogCategorey;
use App\Comment;
use App\Reply;
use App\ServiceSearch;
use App\From;
use App\To;
use App\Hotels;
use App\Resturant;
use App\Visitable;
use App\Speciality;
use App\UserRole;
use App\MessageCount;

class WebsiteController extends Controller{
    public function __construct(){

    }

    public function index(){
        $all=Banner::where('ban_status', 1)->orderBy('ban_id', 'DESC')->limit(3)->get();
        $desSlide=DestinationSlider::where('slider_status', 1)->orderBy('slider_id', 'DESC')->limit(7)->get();
        $choose=ChooseUs::where('choose_status', 1)->orderBy('choose_id', 'DESC')->limit(1)->get();
        $country=TopCountry::where('country_status', 1)->orderBy('country_id', 'DESC')->limit(6)->get();
        $awesome=AwesomePackage::where('awesome_status', 1)->orderBy('awesome_id', 'DESC')->limit(3)->get();
        $counter=Counter::where('counter_status', 1)->orderBy('counter_id', 'DESC')->firstOrFail();
        $gallery=Gallery::where('gallery_status', 1)->orderBy('gallery_id', 'DESC')->limit(9)->get();
        $testimonial=Testimonial::where('testi_status', 1)->orderBy('testi_id', 'DESC')->get();
        $conin=ContactInfo::where('conin_status', 1)->orderBy('conin_id', 'DESC')->firstOrFail();
        $from=From::where('from_status', 1)->get();
        $to=To::where('to_status', 1)->orderBy('to_id', 'DESC')->get();
        return view('website.home', compact('all', 'desSlide', 'choose', 'country', 'awesome', 'counter', 'gallery', 'testimonial', 'conin', 'from', 'to'));
    }

    public function about(){
        $abc=AboutContent::where('abc_status', 1)->orderBy('abc_id', 'DESC')->firstOrFail();
        $choose=ChooseUs::where('choose_status', 1)->orderBy('choose_id', 'DESC')->limit(1)->get();
        $mem=Member::where('member_status', 1)->orderBy('member_id', 'DESC')->limit(4)->get();
        return view('website.about', compact('choose', 'abc', 'mem'));
    }

    public function packages(){
        $awesome=AwesomePackage::where('awesome_status', 1)->orderBy('awesome_id', 'DESC')->get();
        return view('website.packages', compact('awesome'));
    }

    public function gallery(){
        $all=Gallery::where('gallery_status', 1)->orderBy('gallery_id', 'DESC')->get();
        return view('website.gallery', compact('all'));
    }

    public function team(){
        $all=Member::where('member_status', 1)->orderBy('member_id', 'DESC')->get();
        return view('website.team',compact('all'));
    }

    public function price(){
        $tr=Tour::where('tour_status', 1)->orderBy('tour_id', 'DESC')->get();
        $pl=Plan::where('plan_status', 1)->orderBy('plan_id', 'DESC')->get();
        return view('website.price', compact('tr', 'pl'));
    }

    public function faq(){
        return view('website.faq');
    }

    public function page_not_found(){
        return view('website.404');
    }

    public function blog(){
        $cate=BlogCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        $blogs=Blog::where('blog_status', 1)->orderBy('blog_id', 'DESC')->paginate(6);
        return view('website.blog',compact('blogs', 'cate'));
    }

    public function blog_cate($id){
        $cate=BlogCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        $blogs=Blog::where('blog_status', 1)->where('blog_cate_id', $id)->orderBy('blog_id', 'DESC')->paginate(6);
        return view('website.blog',compact('blogs', 'cate'));
    }

    public function blog_role($id){
        $cate=BlogCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        $blogs=Blog::where('blog_status', 1)->where('blog_role_id', $id)->orderBy('blog_id', 'DESC')->paginate(6);
        return view('website.blog',compact('blogs', 'cate'));
    }

    public function blog_time($time){
        $cate=BlogCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        $blogs=Blog::where('blog_status', 1)->whereDate('created_at', $time)->orderBy('blog_id', 'DESC')->paginate(6);
        return view('website.blog',compact('blogs', 'cate'));
    }




    public function blog_search(Request $request){
        $cate=BlogCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        $search =  $request->search;
        $blogs=Blog::orWhere('blog_title', 'LIKE', "%$search%")->orWhere('blog_details', 'LIKE', "%$search%")->orWhere()->published(1)->paginate(6);
        return view('website.blog',compact('blogs', 'cate'));
    }





    public function blog_details($slug){
        $cate=BlogCategorey::where('cate_status', 1)->orderBy('cate_id', 'DESC')->get();
        $blog=Blog::where('blog_status',1)->where('blog_slug', $slug)->firstOrFail();
        return view('website.blog-details', compact('cate', 'blog'));
    }

    public function contact(){
        return view('website.contact');
    }

    public function homeSend(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ],[
            'name.required'=>'Please Enter Your Name',
            'email.required'=>'Please Enter Your Email',
            'message.required'=>'Please Enter Your Message',
        ]);

        $slug='MES_'.uniqid(2019);
        $insert=Contact::insert([
            'message_f_name'=>$_POST['name'],
            'message_email'=>$_POST['email'],
            'message_message'=>$_POST['message'],
            'message_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            $msg=MessageCount::where('id',1)->firstOrFail();
            $msg=$msg->count;

            $msg++;

            $msc=MessageCount::where('id',1)->update([
                "count"=>$msg,
            ]);
            Session::flash('success_message_send','value');
            return redirect('/#cons');
        } else {
            Session::flash('error_message_send','value');
            return redirect('/#cons');
        }

    }

    public function contactSend(Request $request){
        $this->validate($request,[
            'f_name'=>'required',
            'l_name'=>'required',
            'subject'=>'required',
            'email'=>'required',
            'message'=>'required',
        ],[
            'f_name.required'=>'Please Enter Your First Name',
            'l_name.required'=>'Please Enter Your Last Name',
            'subject.required'=>'Please Enter a Subject',
            'email.required'=>'Please Enter Your Email',
            'message.required'=>'Please Enter Your Message',
        ]);

        $slug='MES_'.uniqid(2019);
        $insert=Contact::insert([
            'message_f_name'=>$_POST['f_name'],
            'message_l_name'=>$_POST['l_name'],
            'message_subject'=>$_POST['subject'],
            'message_email'=>$_POST['email'],
            'message_message'=>$_POST['message'],
            'message_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_message_send','value');
            return redirect('contact');
        } else {
            Session::flash('error_message_send','value');
            return redirect('contact');
        }

    }

    public function blog_comment(Request $request, $slugs){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'comment'=>'required',
        ],[
            'name.required'=>'Please Enter Your Name',
            'email.required'=>'Please Enter Your Email',
            'comment.required'=>'Please Enter Your Comment',
        ]);

        $blog=Blog::where('blog_status', 1)->where('blog_slug', $slugs)->firstOrfail();
        $id=$blog->blog_id;
        $slug='CMNT_'.uniqid(2019);
        $insert=Comment::insert([
            'comment_name'=>$_POST['name'],
            'comment_email'=>$_POST['email'],
            'comment_comment'=>$_POST['comment'],
            'blog_id'=>$id,
            'comment_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_comment_send','value');
            return back();
        } else {
            Session::flash('error_comment_send','value');
            return back();
        }

    }

    public function blog_reply(Request $request, $slugs){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'reply'=>'required',
        ],[
            'name.required'=>'Please Enter Your Name',
            'email.required'=>'Please Enter Your Email',
            'reply.required'=>'Please Enter Your Reply',
        ]);

        $comment=Comment::where('comment_status', 1)->where('comment_slug', $slugs)->firstOrfail();
        $id=$comment->comment_id;
        $slug='RPLY_'.uniqid(2019);
        $insert=Reply::insert([
            'reply_name'=>$_POST['name'],
            'reply_email'=>$_POST['email'],
            'reply_reply'=>$_POST['reply'],
            'comment_id'=>$id,
            'reply_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success_reply_send','value');
            return back();
        } else {
            Session::flash('error_reply_send','value');
            return back();
        }

    }

    public function flight_search(Request $request){
        $this->validate($request, [
            'depart'=>'required'
        ],[
            'depart.required'=>'Please Enter a Date'
        ]);

        $frome=$request->from;
        $toe=$request->to;
        $depart=$request->depart;
        $return=$request->return;
        $sits=$request->sits;
        $rooms=$request->rooms;
        $days=$request->days;
        $adult=$request->adult;
        $child=$request->child;
        $searches=ServiceSearch::where('service_type_id', 1)->where('from_id', 'LIKE', "%$frome%")->where('to_id', 'LIKE', "%$toe%")->get();
        $all=Banner::where('ban_status', 1)->orderBy('ban_id', 'DESC')->limit(3)->get();
        $conin=ContactInfo::where('conin_status', 1)->orderBy('conin_id', 'DESC')->firstOrFail();
        $from=From::where('from_status', 1)->get();
        $to=To::where('to_status', 1)->orderBy('to_id', 'DESC')->get();
        return view('website.search',compact('searches', 'adult', 'child', 'all', 'conin', 'from', 'to', 'toe', 'frome', 'depart', 'return', 'sits', 'rooms', 'days'));
    }

    public function buses_search(Request $request){
        $this->validate($request, [
            'depart'=>'required'
        ],[
            'depart.required'=>'Please Enter a Date'
        ]);

        $frome=$request->from;
        $toe=$request->to;
        $depart=$request->depart;
        $return=$request->return;
        $sits=$request->sits;
        $rooms=$request->rooms;
        $days=$request->days;
        $adult=$request->adult;
        $child=$request->child;
        $searches=ServiceSearch::where('service_type_id', 3)->where('from_id', 'LIKE', "%$frome%")->where('to_id', 'LIKE', "%$toe%")->get();
        $all=Banner::where('ban_status', 1)->orderBy('ban_id', 'DESC')->limit(3)->get();
        $conin=ContactInfo::where('conin_status', 1)->orderBy('conin_id', 'DESC')->firstOrFail();
        $from=From::where('from_status', 1)->get();
        $to=To::where('to_status', 1)->orderBy('to_id', 'DESC')->get();
        return view('website.search',compact('searches', 'adult', 'child', 'all', 'conin', 'from', 'to', 'toe', 'frome', 'depart', 'return', 'sits', 'rooms', 'days'));
    }

    public function hotel_search(Request $request){
        $this->validate($request, [
            'depart'=>'required'
        ],[
            'depart.required'=>'Please Enter a Date'
        ]);

        $frome=$request->from;
        $toe=$request->to;
        $depart=$request->depart;
        $return=$request->return;
        $sits=$request->sits;
        $rooms=$request->rooms;
        $days=$request->days;
        $adult=$request->adult;
        $child=$request->child;
        $searches=ServiceSearch::where('service_type_id', 2)->where('from_id', 'LIKE', "%$frome%")->get();
        $all=Banner::where('ban_status', 1)->orderBy('ban_id', 'DESC')->limit(3)->get();
        $conin=ContactInfo::where('conin_status', 1)->orderBy('conin_id', 'DESC')->firstOrFail();
        $from=From::where('from_status', 1)->get();
        $to=To::where('to_status', 1)->orderBy('to_id', 'DESC')->get();
        return view('website.search',compact('searches', 'adult', 'child', 'all', 'conin', 'from', 'to', 'toe', 'frome', 'depart', 'return', 'sits', 'rooms', 'days'));
    }

    public function cities_search(Request $request){
        $search=$request->search;
        $cities=From::where('from_status', 1)->where('from_name', 'LIKE', "%$search%")->firstOrFail();
        $all=Banner::where('ban_status', 1)->orderBy('ban_id', 'DESC')->limit(3)->get();
        $conin=ContactInfo::where('conin_status', 1)->orderBy('conin_id', 'DESC')->firstOrFail();
        $from=From::where('from_status', 1)->get();
        $to=To::where('to_status', 1)->orderBy('to_id', 'DESC')->get();
        return view('website.cities',compact('cities', 'all', 'conin', 'from', 'to'));
    }

    public function hotel_details($slug){
        $hotel=Hotels::where('hotel_status',1)->where('hotel_slug', $slug)->firstOrFail();
        return view('website.hotel-details', compact('hotel'));
    }

    public function resturant_details($slug){
        $resturant=Resturant::where('resturant_status',1)->where('resturant_slug', $slug)->firstOrFail();
        return view('website.resturant-details', compact('resturant'));
    }
    public function visitable_details($slug){
        $visitable=Visitable::where('visitable_status',1)->where('visitable_slug', $slug)->firstOrFail();
        return view('website.visitable-details', compact('visitable'));
    }
    public function speciality_details($slug){
        $speciality=Speciality::where('speciality_status',1)->where('speciality_slug', $slug)->firstOrFail();
        return view('website.speciality-details', compact('speciality'));
    }

}
