@extends('layouts.master')

@section('content')
<div class="content-wrapper pb-5">
    <div class="">
        <div class="container-fluid pt-5">
            <div class="basic-card p-3 mx-3">
                <div class="row mb-3">
                    <div class="col-lg-10 col-12">
                        <h4 class="allbizcard__head ">Share Contact Lists</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="userTransaction">
                                <thead>
                                    <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!is_null($users))
                                  @foreach ($users as $user)
                                    <tr>
                                      <th scope="row">{{$loop->iteration}}</th>
                                      <td>
                                          <span style="text-transform: capitalize;">{{$user->username}}</span>
                                      </td>
                                      <td>{{$user->email}}</td>
                                      <td>{{$user->phone}}</td>
                                      <td>{{$user->address}}</td>
                                      <td>{{$user->city}}</td>
                                      <td>{{$user->country}}</td>
                                      <td>
                                          <img src="{{asset('public/assets/images/user/'.$user->image)}}" alt="{{$user->username}}" width="40px" height="40px">
                                      </td>
                                    </tr>
                                  @endforeach
                                  @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection