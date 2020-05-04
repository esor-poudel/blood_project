@extends('layouts.forum')

@section('content')

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($existing_donar==false)
                    @if($current_donar_status->approved==1)
                   

                   
                    <div class="col-lg-3">
                      <div class="card text-center" style="width: 15rem;">
                          <div class="card-header">
                            blood Needed
                          </div>
                          <div class="card-body">
                           
                         @foreach($donar as $d)
                         @foreach($need as $n)
                         @if($d->b_group == $n->blood_group)
                        
                         {{$n->contact_name}}  {{$n->mobile_no}}<br>
                       
                         
                       
                         @endif

                         @endforeach
                         @endforeach
                        
                           
                          </div>
                          <div class="card-footer text-muted">
                          <a href="{{route('donar.request.view')}}" class="btn btn-primary">view</a>
                          </div>
                        </div>
                       
                       
                        <br><br>
                   
                    <div class="col-lg-3">
                        <div class="card text-center" style="width: 10rem;">
                            <div class="card-header">
                              Status
                            </div>
                            <div class="card-body">
                              approved
                            </div>
                          </div>


                          


                   
                    @else
                    <div class="col-lg-3">
                        <div class="card text-center">
                        <div class="card-header ">
                        status
                        </div>
                        <div class="card-body">
                         please wait for conformation
                        </div>
                        </div>
                        </div>
                   
                    @endif
                    @else
                    <p> You are logged in as donar</p>
                    @endif


                   
                </div>
            </div>
@endsection
