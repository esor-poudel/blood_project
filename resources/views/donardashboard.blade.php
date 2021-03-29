@extends('layouts.forum')

@section('content')

            <div class="card">
              @if($existing_donar==false)
              @if($current_donar_status->approved==1)
                <div class="card-header">Dashboard</div>
                @else
                <div class="card-header"><h4>Thanks For The Membership {{Auth::user()->name}}</h4></div>
                @endif
                @endif

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

                        
                       
                         
                       
                           
                          </div>
                          <div>
                          <div class="card-footer text-muted">
                          <a href="{{route('donar.request.view')}}" class="btn btn-primary">view</a>
                          </div>
                          @endif
                          @endforeach
                          @endforeach
                          </div>
                        </div>
                       
                       
                       
                       
                        <br><br>
                   
                  
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
