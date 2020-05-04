@extends('layouts.app')


@section('content')

@if(isset($result))
<p>All Donars with <b>{{$query}}</b> blood group are:</p>
<h2>Donars List</h2>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-hover">


            <thead>

            <th> Donar name </th>
            <th>Date-Of-birth</th>
            <th>last Donated</th>
            <th>Blood Group</th> 
            <th> Address</th>
             <th> Number</th>
            </thead>
            <tbody>
           
           @foreach($result as $results)
            <tr>
            <td> {{$results->name}} </td>
            <td>{{$results->birth}}</td>
            <td>{{$results->d_date}}</td>
            <td>{{$results->b_group}}</td>
            <td>{{$results->address}}</td>
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