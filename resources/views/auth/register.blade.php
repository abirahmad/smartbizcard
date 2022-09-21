@extends('layouts.frontend-master')

@section('content')
<div class="content-wrapper ">
<div class="container-fluid"  style="background: #F1F4F9">
    <div class="row justify-content-center">
      
            <div class="card p-lg-5 my-5 mx-3 login-section registration-section">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                <h2 class=" text-center login-title">Get Started!</h2>
                <p class="login-subtitle text-center pb-3">Fill the form to register</p>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                            <div class="col-6 pr-1">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" style="border-radius: 20px" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 pl-1">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" style="border-radius: 20px" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <div class="col-md-12">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" style="border-radius: 20px" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12" style="margin-top:20px">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" style="border-radius: 20px" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"style="border-radius: 20px" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" style="border-radius: 20px" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="login-btn text-center mt-3 mb-4">
                                <button type="submit " class="btn text-white">
                                    {{ __('Sign up') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-center">
                        <a  href="{{ route('login') }}">
                            <span class="text-dark font-weight-bold">Already have an account?</span>
                         <span class="text-primary sign-up-link font-weight-bold">Sign in</span>  
                        </a>
                    </div>
                    </form>
                </div>
            </div>
        
    </div>
</div>
</div>
@endsection
