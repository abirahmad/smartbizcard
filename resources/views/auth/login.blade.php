@extends('layouts.frontend-master')

@section('content')
<div class="content-wrapper ">
<div class="container-fluid">
    <div class="row">
        <div class=" card p-5 login-section my-5 bg-light">
            <div class="justify-content-center">
                <h2 class=" text-center login-title">Welcome Back</h2>
                <p class="login-subtitle text-center pb-3">Please enter your credentials to proceed</p>
                {{-- <div class="">{{ __('Login') }}</div> --}}

                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('error')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="justify-content-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                <i class="fas fa-user"></i>  <input id="username" type="username" class="form-control login-user-icon   @error('username') is-invalid @enderror" style="border-radius: 20px;padding-left:33px" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-lg-12">
                                <div class="d-flex login__icon-z">
                                    <i class="fas fa-lock"></i> <input id="password" type="password" class="form-control login-user-icon  @error('password') is-invalid @enderror" name="password" style="border-radius: 20px;padding-left:33px" required autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="float-right ">
                        @if (Route::has('password.request'))
                        <a class="text-dark forgot-password forgot-margin" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password') }}
                        </a>
                    @endif
                </div>
                <div class="clearfix"></div>
                        <div class="text-center">
                            <div class="login-btn mt-4">
                                <button type="submit" class="btn text-white">
                                    {{ __('Log In') }}
                                </button>


                            </div>
                            <br>
                                 <div class="mt-1">
                                    <a  href="{{ route('register') }}">
                                        <span class="text-dark font-weight-bold dont__have">Don't have an account?</span>
                                     <span class="text-primary sign-up-link font-weight-bold">Sign Up</span>
                                    </a>
                                </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
