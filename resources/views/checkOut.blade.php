@extends('layouts.app')

@push('head')
{{-- <link rel="stylesheet" href="{{ asset('css/checkout.css') }}"> --}}
@endpush

@section('title', 'Checkout Page')

@section('content')
<div class="container">
    <h1 class="h1">Checkout</h1>
    @if ($addresses->count() > 0)
        <p>{{ $firstAddress->receiverName }} <br>
            {{ $firstAddress->phoneNumber }} <br>
            {{ $firstAddress->addressName }}, {{ $firstAddress->addressDetail }}</p>
            <input type="hidden" name="redirect_to" value="{{ url()->current() }}">
        <a href="{{ route('address.chooseAddress') }}" class="btn btn-secondary">Edit Address</a>
    @else
        <p>No address found. Please add an address in your profile.</p>
        <a href="{{ route('address.create') }}" class="btn btn-primary">Add New Address</a>
    @endif  
</div>
@endsection
