@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="{{ asset('css/discover.css') }}">
@endpush

@section('title', 'Discover')

@section('content')
    <p class="h1 centerText">These are the items you may need...</p>
    <div class="col-md-8 searchForm">
        <div class="search">
            <i class="fa fa-search"></i>
            <input type="text" class="form-control" placeholder="Have a question? Ask Now">
            <button class="btn btn-primary">Search</button>
        </div>
    </div>
@endsection