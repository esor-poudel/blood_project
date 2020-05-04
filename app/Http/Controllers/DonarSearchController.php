<?php

namespace App\Http\Controllers;
use App\Donar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;



class DonarSearchController extends Controller
{
    public function search()
    {
        
            $q= Input::get('search');
            if($q != ' ')
            {
                    $result= Donar::where('b_group',$q)->where('approved',1)->get();
                    if(count($result)>0)
                    {
                        return view('seekers.result')->with('result',$result)->withQuery($q);
                    }
            }
           // dd($result);
            return view('seekers.result')->with('message',"No Donar Found");
            
    }
}
