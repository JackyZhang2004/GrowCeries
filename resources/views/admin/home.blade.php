@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
@endpush

@section('title', 'Admin Home')

@section('content')
    <div class="successMessage">
      @include('widgets.successMessage')
    </div>
    <div class="errorMessage">
        @include('widgets.errorMessage')
    </div>
    <p class="h1">Welcome Admin</p>
    <p>Home page</p>
    <a href="{{ route('admin.users') }}"> redirect to Users page</a>
    <a href="{{ route('admin.products') }}"> redirect to product page</a>

@endsection