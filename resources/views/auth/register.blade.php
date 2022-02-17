@extends('layouts.app')

@section('content')
    <body class=" login" style="background-color: #F2F2F8 !important;">
    <div class="logo">
        <a href="index.html">
            <img src="{{asset('assets/img/logo.png')}}" alt=""/> </a>
    </div>
    <div class="content">
        <form class="login-form" method="post" action="{{ route('register') }}">
            @csrf
            <h3 class="form-title font-green">Register</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter any username and password. </span>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Name</label>
                <input placeholder="Name"
                       class="form-control  @error('name') is-invalid @enderror form-control-solid placeholder-no-fix"
                       id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                       autofocus/></div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
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
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                <input
                    class="form-control form-control-solid placeholder-no-fix @error('password') is-invalid @enderror"
                    placeholder="password-confirm" id="password-confirm" type="password" name="password_confirmation"
                    required autocomplete="new-password"/></div>
            <button type="submit" class="btn green uppercase">Register</button>

        </form>
    </div>
    <div class="copyright"> 2022 © QVOTE.</div>
    </body>
@endsection
