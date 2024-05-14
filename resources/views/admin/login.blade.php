@extends('layouts.appAdmin')

@push('head')
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/layout/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/layout/main.css')}}">
<!--===============================================================================================-->
@endpush

@section('title', 'Admin Login')
 
@section('success')
    @include('widgets.successMessage')
@endsection

@section('error')
    @include('widgets.errorMessage')
@endsection

@section('login')
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form" action="{{ route('admin.authenticate') }}" method="POST">
                @csrf
                <span class="login100-form-title p-b-49">
                    Admin Login
                </span>

                <div class="wrap-input100 validate-input m-t-23">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="email" placeholder="Type your email">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror

                <div class="wrap-input100 validate-input m-t-23">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Type your password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>
                @error('password')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror

                <div class="container-login100-form-btn p-t-50">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit">
                            Login As Admin
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection