@extends('layouts.forum') 
@section ('content')
@if($show_form == false)
    
<form action="{{route('profile.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                    <label for="name">Last Donate Date</label>
                    <input type="date" name="date" class="form-control">
                    </div>

                    
                    <div class="form-group">
                        <div class="text-center">
                        <button class="btn btn-success " type="submit">update profile</button>
                     </div>
                     @else
                     <h1>please fill the Donar Form</h1>


                     @endif



 @endsection
              
                    