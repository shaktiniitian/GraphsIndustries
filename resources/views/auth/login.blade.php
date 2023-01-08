@extends('layouts.app')

@section('content')


<div class="ibox login-content">
    <div class="text-center">
        <span class="auth-head-icon"><i class="la la-user"></i></span>
    </div>
    <form class="ibox-body form-pink" id="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <h4 class="font-strong text-center mb-5">LOG IN</h4>
        <div class="form-group mb-4">
            <input class="form-control form-control-rounded form-control-air form-control-lg" type="text" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group mb-4">
            <input class="form-control form-control-rounded form-control-air form-control-lg" type="password"
                name="password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- <div class="flexbox mb-5">
            <span>
                <label class="ui-switch ui-switch-pink switch-icon mr-2 mb-0">
                    <input type="checkbox" checked="">
                    <span></span>
                </label>Remember</span>
            <a class="text-pink" href="forgot_password.html">Forgot password?</a>
        </div> -->
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-pink btn-lg btn-rounded btn-fix btn-air"
                style="width:200px;">LOGIN</button>
        </div>
    </form>
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>


@endsection