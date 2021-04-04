<?php

namespace App\Http\Controllers;

use App\Donar;
use App\District;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;



class DonarSearchController extends Controller
{
    public function search(Request $request)
    {
        $district = District::all();
        $city = City::all();
        $q = Input::get('search');
        if ($q != ' ') {
            $result = Donar::where('b_group', $q)->where('approved', 1)->whereMonth('d_date', '>', '3')->get();
            if (count($result) > 0) {
                return view('seekers.result')->with('result', $result)
                    ->withQuery($q)
                    ->with('district', $district)
                    ->with('city', $city);
            }
        }

        return view('seekers.result')->with('message', "No Donar Found");
    }
}
