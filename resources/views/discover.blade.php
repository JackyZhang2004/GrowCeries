@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="{{ asset('css/discover.css') }}">
@endpush

@section('title', 'Discover')

@section('content')
    <p class="h1 centerText">These are the items you may need...</p>
    @include('widgets.searchBar')
@endsection