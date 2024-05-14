@extends('layouts.appCourier')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
@endpush

@section('title', 'Courier Home')

@section('content')
    <div class="successMessage">
      @include('widgets.successMessage')
    </div>
    <div class="errorMessage">
        @include('widgets.errorMessage')
    </div>
    <p class="h1">Welcome Courier</p>
    <p>Home page</p>


@endsection