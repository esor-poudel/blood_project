<?php

namespace App\Http\Controllers;
use App\District;
use App\City;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $district= District::all()->pluck('name','id');
        
        return view('welcome')->with('district',$district);
    }
    public function city($id)
    {
        $city= City::where('district_id',$id)->pluck('name','id');
        return json_encode($city);
    }
}
