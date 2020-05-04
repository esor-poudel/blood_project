<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Donar;

class ProfileController extends Controller
{
    public function index()
    {
        $existing_donors = Donar::all()->pluck('user_id')->toArray(); 
        $show_form = true;
        if(in_array(auth::id(), $existing_donors))
            {
                $show_form = false;

            }
        //    $current_date = date("Y-m-d");
       // $today = \Carbon\Carbon::now();
         //  dd($today);  

        return view('donar.donars.edit')->with('show_form',$show_form);
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'date'=>'required'

        ]);
    }
}
