@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('title', 'Profile Page')

@section('content')
    <div class="jumbotron">
        <div class="profilePicture">
            <img src="{{ $user->image() }}" alt="PROFILE PICTURE">
        </div>
    </div>
    <h1>Personal Data</h1>
    <br>
    <div class="personalData">
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
        <span class="data" id="phone"></span>
    </div>
@endsection

@section('script')

@endsection
