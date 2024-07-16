@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('title', 'Profile Page')

@section('content')
    <div class="banner-faq">
        <div class="banner">
            <img src="{{ $user->image() }}" alt="PROFILE PICTURE" class="full-img">
        </div>
    </div>

    <br>
    <div class="personalData">
        <h1>Personal Data</h1>
        <span class="data" id="name">
            <p>{{ $user->name }}</p>
            <a href=""><img src="" alt=""></a>
        </span>
        <br>
        @if ($user->gender)
            <span class="data" id="gender">{{ $user->gender }}</span>
        @else
            <span class="data" id="gender">not set yet</span>
        @endif
        <br>
        <span class="data" id="phone">{{ $user->phoneNumber }}</span>
        <br>
        <span class="data" id="phone">{{ $user->email }}</span>
    </div>
    <div class="address">
        <h1>Address</h1>
        <span class="data" id="phone"></span>
    </div>
@endsection

@section('script')

@endsection
