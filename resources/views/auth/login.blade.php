@extends('layouts.app')

@section('content')
    <body class=" login" style="background-color: #F2F2F8 !important;">
    <div class="logo">
        <a href="index.html">
            <img src="{{asset('assets/img/logo.png')}}" alt=""/> </a>
    </div>
    <div class="content">
        <form class="login-form" method="post" action="{{ route('login') }}">
            @csrf
            <h3 class="form-title font-green">Login</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter any username and password. </span>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Email Address</label>
                <input placeholder="Email Address"
                       class="form-control  @error('email') is-invalid @enderror form-control-solid placeholder-no-fix"
                       id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                       autofocus/></div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input
                    class="form-control form-control-solid placeholder-no-fix @error('password') is-invalid @enderror"
                    placeholder="Password" id="password" type="password" name="password" required
                    autocomplete="current-password"/></div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">Login</button>
                <input class="form-check-input" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember') }}
                </label>

                @if (Route::has('password.request'))
                    <a id="forget-password" class="forget-password" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <div class="create-account">
                <p>
                    <a href="{{ route('register') }}" id="register-btn" class="uppercase">Create an account</a>
                </p>
            </div>
        </form>
    </div>
    <div class="copyright"> 2022 © QVOTE.</div>
    </body>
@endsection
