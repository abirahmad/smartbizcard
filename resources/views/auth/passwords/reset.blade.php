@extends('layouts.frontend-master')

@section('content')
<div class="container-fluid" style="background: #F1F4F9">
    <div class="row" style="height: 100vh">
        <div class=" card p-5 login-section">
            <div class="justify-content-center">
                <h2 class=" text-center login-title">Reset Password</h2>
                <p class="login-subtitle text-center pb-3">Please enter your new password to proceed</p>
                <div class="justify-content-center">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                           

                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email address">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your new password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter your confirm password">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <div class="login-btn mt-4">
                                <button type="submit" class="btn text-white">
                                    {{ __('Reset Password') }}
                                </button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
   
</div>
@endsection
