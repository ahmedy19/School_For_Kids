@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card register_card">

                <div class="card-body">

                    <h4 class="register_header text-center">Login</h4>

                    <form class="mt-4" id="recaptcha" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>


                        <!--Recaptcha-->
                            <div class="form-group row justify-content-center">
                                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display:block;">
                                        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                    </span>
                                @endif
                            </div>
                        <!--Recaptcha/-->



                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 text-center">

                                <button class="col-md-8 btn btn-primary btn-green" type="submit" >
                                    {{ __('Login') }}
                                </button>

                                <div class="mt-2">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link login-link link_color" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
