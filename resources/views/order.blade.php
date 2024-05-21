@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endpush

@section('title', 'My Orders')

@section('content')
    <div class="container">
        <h1 class="h1">My Orders</h1>
        @if ($orders->isEmpty())
            <p>No orders found.</p>
        @else
        
        @endif
    </div>
@endsection
