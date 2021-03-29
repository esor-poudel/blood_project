@extends('layouts.forum')


@section('content')

@if(isset($result))
<p>All Donars with <b>{{$query}}</b> blood group are:</p>
<h2>Donars List</h2>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-hover">


            <thead>

            <th>Photo</th>
            <th> Donar name </th>
            <th>Date-Of-birth</th>
            <th>last Donated</th>
            <th>Blood Group</th> 
            <th> District</th>
            <th>City</th>
             <th> Number</th>
            </thead>
            <tbody>

            
           
           @foreach($result as $results)
            <tr>
               <td><img src="{{asset('uploads/image/'.$results->image)}}"  width="140px" height="140px" style="border-radius:50%;" alt="image"></td>
            <td> {{$results->name}} </td>
            <td> {{date('F j,Y',strtotime($results->birth))}}</td>
            <td>{{date('F j,Y',strtotime($results->d_date))}}</td>
            <td>{{$results->b_group}}</td>
            @foreach($district as $d)
            @if($results->district_id===$d->id)
            <td>{{$d->name}}</td>
            @endif
            @endforeach
            @foreach($city as $c)
            @if($results->city_id===$c->id)
            <td>{{$c->name}}</td>
            @endif
            @endforeach
            <td>{{$results->ph_number}}</td>

            </tr>

         @endforeach
        
            </tbody>

            </table>
</div>

</div>
@elseif(isset($message))
<h2>{{$message}}</h2>
@endif


@stop