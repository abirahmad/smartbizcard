@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper pb-4">

    <div class="container pt-4">

    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="allbizcard__head ml-lg-3">User Details</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card card-primary card-outline mx-lg-3">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('public/assets/images/user/'.$user->image )}}" alt="User profile picture">
                      </div>

                      <h3 class="profile-username text-center font-weight-bold">
                      @if(!empty($user->first_name))
                        {{$user->first_name}}
                      @else
                        ---
                      @endif
                      
                      @if(!empty($user->last_name))
                        {{$user->last_name}}
                      @else
                        ---
                      @endif
                      </h3>

                      <p class="text-muted text-center">
                        @if (!empty($user->designation))
                        {{$user->designation}}
                        @else
                        ------
                        @endif
                      </p>

                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>User Name</b> <a class="float-right font-weight-bold">
                            @if (!empty($user->username))
                              {{$user->username}}
                            @else
                              Not Found
                            @endif
                          </a>
                        </li>
                        <li class="list-group-item">
                          <b>Gender</b> <a class="float-right font-weight-bold">
                            @if (!empty($user->sex))
                              {{$user->sex}}
                            @else
                              Not Found
                            @endif
                          </a>
                        </li>
                        <li class="list-group-item">
                          <b>Email</b> <a class="float-right font-weight-bold">
                            @if (!empty($user->email))
                              {{$user->email}}
                            @else
                              Not Found
                            @endif
                          </a>
                        </li>
                      </ul>

                      <!-- <a href="#" class="btn btn-primary btn-block follow-btn"><b>Follow</b></a> -->
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <!-- <strong><i class="fas fa-book mr-1"></i> Education</strong>

                      <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                      </p>

                      <hr> -->

                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                      <p class="text-muted">
                        @if (!empty($user->address))
                          {{$user->address}}
                        @else
                          Not Found
                        @endif
                      </p>

                      <hr>

                      <strong><i class="fas fa-map-marker-alt mr-1"></i> City & Country</strong>

                        <p class="text-muted">
                          @if (!empty($user->city) && !empty($user->country))
                          {{$user->country}}, {{$user->country}}.
                          @else
                            Not Found
                          @endif
                        </p>

                        <hr>

                      <strong><i class="fas fa-phone mr-1"></i>Phone</strong>

                      <p class="text-muted">
                       @if (!empty($user->phone))
                         {{$user->phone}}
                        @else
                        Not Found
                       @endif
                      </p>

                      <hr>

                      <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                      <p class="text-muted">
                        @if (!empty($user->description))
                          {{$user->description}}
                        @else
                        Not Found
                        @endif
                      </p>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
