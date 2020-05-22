@extends('layouts.forum') 
@section ('content')
 @foreach($current_profile as $donar)
<div class="text-center"><h1>Hi {{$donar->name}}</h1></div>
<div class="text-center"><h6>your last donation date is {{date('F j,Y',strtotime($donar->d_date))}}, address= {{$donar->address}} and mobile number= {{$donar->ph_number}}</h6></div>
<div class="text-center"><h4>update profile</h4></div>
<form action="{{route('profile.store',['id'=>$donar->id])}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">


                        <label for="name">Last Donate Date</label>
                        <input type="date" name="date" class="form-control">

                        
                    </div>

                    
                    <div class="form-group">
                        <div class="text-center">
                        <button class="btn btn-success " type="submit">update profile</button>
                     </div>
                     @endforeach


 @endsection
              
                    