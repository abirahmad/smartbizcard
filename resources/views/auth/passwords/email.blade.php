@extends('layouts.frontend-master')

@section('content')
<div class="container-fluid" style="background: #F1F4F9">
    <div class="row" style="height: 100vh">
        <div class="card p-5 login-section">
            <div class="justify-content-center">
                <h2 class="text-center login-title">Reset Password</h2>
                <p class="login-subtitle text-center pb-3">Please enter your mail to get the reset password link</p>
                <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif -->

                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="justify-content-center">
                    
                <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                           

                            <div class="col-lg-12">
                                <div class="d-flex">
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                            </div>

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                <div class="clearfix"></div>
                        <div class="text-center">
                            <div class="login-btn mt-4">
                                <button type="submit" class="btn text-white">
                                    {{ __('Send Reset Link') }}
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
