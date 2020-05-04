<?php

namespace App\Http\Controllers;
use App\Need;
use Auth;
use Notification;
use App\Donar;
use Session;

use Illuminate\Http\Request;

class NeedController extends Controller
{
    public function need()
    {
        return view('seekers.bloodneed');
    }

    public function save()
    {
        $this->validate(request(),[
            'blood_group'=>'required',
            'place'=>'required',
            'contact_name'=>'required',
            'mobile_no'=>'required',
            'need_date'=>'required|date_format:Y-m-d'
        ]);
        $n= new Need;
        $n->blood_group= request()->blood_group;
        $n->place=request()->place;
        $n->contact_name= request()->contact_name;
        $n->need_date= request()->need_date;
        $n->mobile_no=request()->mobile_no;
        $n->email= request()->email;
        $n->save();
        Session::flash('success','your request is submitted');
        return redirect()->back();
    }

    public function requestblood()
    {
        return view('admin.request')->with('request',Need::all());
    }

    
    public function donarview()
    {
        $n= Need::where('status',0)->get();
        $d= Donar::where('approved',1)->where('user_id',Auth::id())->get();
        return view('donar.request')->with('request',$n)
                                    ->with('donar',$d);
    }

    public function needaccept($id,$need)
    {
        $donar= Donar::find($id);
        $n= Need::find($need);

       
        
       $n->status= 1;
        $n->save();
       
        //Notification::send($n, new \App\Notifications\NeedAccpeted($donar));


        Session::flash('success','please visit given place for donation');
        return redirect()->back();


    }
}