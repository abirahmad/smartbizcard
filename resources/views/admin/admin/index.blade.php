@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="">
            <div class="container-fluid pt-5">
                <div class="basic-card p-3 mx-3">

                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-muted" style="text-transform: capitalize">{{$username}}</h2>
                            <p class="text-muted">Below this option you can change your credential</p>
                            <!-- <p><span>Change:</span> <a href="#emailUserModal" data-toggle="modal"> Userame & Email</a></p> -->
                            <!-- <p><span>Change: </span><a href="#passwordModalCenter" data-toggle="modal"> Password</a></p> -->
                            <div class="row">
                                <div class="col-md-12">
                                <button type="button" class="btn btn-primary border-radius20 py-1 px-3" data-toggle="modal"
                                data-target="#emailUserModal">Change Userame & Email</button>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                <button type="button" class="btn btn-primary border-radius20 py-1 px-3" data-toggle="modal"
                                data-target="#passwordModalCenter">Change Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- username & email modal -->
    <div class="modal fade bd-example-modal-lg" id="emailUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><span style="text-transform: capitalize;">Update username & email</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal__body-invoice">
                    <form role="form" action="{{route('admin.adminUsernameEmail.store',$adminId)}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">User Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" placeholder="username" value="{{$username}}">

                                @error('username')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="Email" value="{{$email}}">
                                @error('email')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- password modal -->

    <div class="modal fade bd-example-modal-lg" id="passwordModalCenter" tabindex="-1" role="dialog" aria-labelledby="my" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><span style="text-transform: capitalize;">Change Password</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal__body-invoice">
                    <form role="form" action="{{route('admin.updateAdminPassword.store',$adminId)}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="password_current" class="col-sm-4 col-form-label">Current Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control @error('password_current') is-invalid @enderror"
                                id="password_current" name="password_current" placeholder="current password" required autocomplete="new-password">

                                @error('password_current')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="new password" required autocomplete="new-password">
                                @error('password')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control"
                                id="password_confirmation" placeholder="confirm password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
