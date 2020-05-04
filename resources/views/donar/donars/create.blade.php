   @extends('layouts.forum') 
   @section ('content')
  

@if($show_form == true)
    
<form action="{{route('donars.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" value="{{old('name')}}"class="form-control">
                    </div>
              
                    
                    <div class="form-group">
                    <label for="name">Date of Birth</label>
                    <input type="date" name="birth" value="{{old('birth')}}"class="form-control">
                    </div>

                    
                    <div class="form-group">
                    <label for="name">Blood Group</label>
                   <select id="b_group" name="b_group">
                   <option value="A+"> A+ </option>
                   <option value="A-"> A- </option>
                   <option value="B+"> B+ </option>
                   <option value="B-"> B- </option>
                   <option value="O+"> O+ </option>
                   <option value="O-"> O- </option>
                   <option value="AB+"> AB+ </option>
                   <option value="AB-"> AB- </option>
                   </select>
                    </div>

                     
                    <div class="form-group">
                    <label for="name">Last Donate Date</label>
                    <input type="date" name="d_date" class="form-control">
                    </div>

                     
                    <div class="form-group">
                    <label for="name">Phone Number</label>
                    <input type="text" name="ph_number" value="{{old('ph_number')}}"class="form-control">
                    </div>

                     
                    <div class="form-group">
                    <label for="name">address</label>
                    <input type="text" name="address" value="{{old('address')}}"class="form-control">
                    </div>


                    <div class="form-group">
                    <div class="text-center">
                    <button class="btn btn-success " type="submit">register</button>
                    </div>
                    @else
                    <h1>cannot show this view</h1>
@endif

 


    


 @endsection