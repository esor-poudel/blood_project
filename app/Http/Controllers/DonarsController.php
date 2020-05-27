<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donar;
use App\Notifications\NewDonarAdded;
use App\Need;
use Carbon;
use App\User;
use Auth;
use Session;
class DonarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

     //   $current_donar = Donar::find(auth::id())->first();
      
      //  $donar= Donar::onlyTrashed()->get();
      
      $unapproved_donar = Donar::where('approved',0)->get();

    

      $donar= Donar::where('approved',0)->get();
    
        return view('admin.donars.unregisteredDonar')->with('donars',$donar)
                                         ->with('approved',$unapproved_donar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $admin= User::where('admin',1)->first();
       $notification= Donar::where('user_id',auth::id());
      // dd($admin);
       // dd(request()->all());
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'ph_number'=>'required',
            'b_group'=>'required',
            'birth'=>'required|date_format:Y-m-d',
            'd_date'=>'required|date_format:Y-m-d'
        ]);
        

        $donar= new Donar;
        $donar->name= $request->name;
        $donar->address= $request->address;
        $donar->ph_number= $request->ph_number;
        $donar->b_group= $request->b_group;
        $donar->birth= $request->birth;
        $donar->d_date= $request->d_date;
        $donar->user_id= Auth::id();
        $donar->save();
       $admin->notify(new NewDonarAdded($notification));
        Session::flash('success','register completed');
       // $donar->delete();
        return redirect()->route('dashboard');
       
    }

    public function restore($id)
    {
       // $donar= Donar::withTrashed()->where('id',$id)->first();
       $donar= Donar::find($id);
        $donar->approved = 1;
        $donar->save();
       // $donar->restore();
        Session::flash('success','Donar Approved');
        return redirect()->back();
    }

    public function kill($id)
    {
      //  $donar= Donar::withTrashed()->where('id',$id)->first();
      //  $donar->forceDelete();
      $donar= Donar::find($id);
     // $user= User::where('id',auth::id());
      $donar->delete();
     // $donar->user->delete();
        Session::flash('success','Donar Deleted successfully');
        return redirect()->back();
    }
    public function alldonar()
    {
        $donars = Donar::where('approved',1)->get();
        return view('admin.donars.registeredDonar')->with('donars',$donars);
                                            
    }

    public function BecomeDonar()
    {
        $existing_donors = Donar::all()->pluck('user_id')->toArray(); 
        $show_form = true;
        if(in_array(auth::id(), $existing_donors))
            {
                $show_form = false;

            }

       // $approved_status = Donar::withTrashed()->find(auth::id())->first();
       // $current_donar =  Donar::find(auth::id())->first();

    
   // dd($current_donar);
      

           
       // $donar= Donar::withTrashed()->get();
        return view('donar.donars.create')
                                   //  ->with('current_donar',$current_donar)
    
                                            ->with('show_form',$show_form);

      
    }

   
    

   

}
