@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
@endpush

@section('title', 'Home')

@section('content')
    <p>tes</p>
    {{-- untuk navbarnya udah ada dari layouts.app, jadi langsung ngoding bagian home yang jumbotron --}}
    {{-- kalo mau ngoding dimulai dari sini --}}
@endsection