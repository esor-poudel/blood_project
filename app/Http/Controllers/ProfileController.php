<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Donar;

class ProfileController extends Controller
{
    public function index()
    {

        $current_profile= Donar::where('user_id',auth::id())->where('approved',1)->get();
      // dd($current_profile);
        $existing_donors = Donar::all()->pluck('user_id')->toArray(); 
        $show_form = true;
        if(in_array(auth::id(), $existing_donors))
            {
                $show_form = false;

            }
            if($show_form==true)
            {
                Session::flash('info','please fill up the donation form');
                return redirect()->back();
            }
            else{
                return view('donar.donars.edit')->with('current_profile',$current_profile);
            }

       
    }

    public function store(Request $request,$id)
    {
        $this->validate($request,[

            'date'=>'required'
        ]);
        $donar = Donar::find($id);
        $donar->d_date= $request->date;
        $donar->save();
        Session::flash('success','last donated date updated');
        return redirect()->back();
    }
}
