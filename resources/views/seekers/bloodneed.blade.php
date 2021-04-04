@extends('layouts.forum')
@section('content')

<form action="{{route('need.save')}}" method="POST">
    {{csrf_field()}}

    <div class="form-group">
        <div class="container">
            <h3>post a need for blood<h3>
        </div><br><br>
        <label for="name">Blood Group</label>
        <select id="blood_group" name="blood_group">
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
        <label for="name">Place</label>
        <input type="text" name="place" class="form-control">
    </div>

    <div class="form-group">
        <label for="name">Contact Name</label>
        <input type="text" name="contact_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="name">Contact Mobile No.</label>
        <input type="text" name="mobile_no" class="form-control">
    </div>

    <div class="form-group">
        <label for="name">Email.</label>
        <input type="email" name="email" placeholder="optional" class="form-control">
    </div>

    <div class="form-group">
        <label for="name">Date When Blood Required</label>
        <input type="date" name="need_date" class="form-control">
    </div>

    <div class="form-group">
        <div class="text-center">
            <button class="btn btn-success " type="submit">register</button>
        </div>
</form>

@endsection