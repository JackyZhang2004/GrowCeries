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
        <a href="{{ route('address.chooseAddress', ['selectedItems' => request()->input('selectedItems')]) }}" class="btn btn-secondary">Edit Address</a>
    @else
        <p>No address found. Please add an address in your profile.</p>
        {{-- <a href="{{ route('address.create') }}" class="btn btn-primary">Add New Address</a> --}}
    @endif

    <div>
        <?php
        $value = 0;
        ?>
        <p class="h3">Ordered Products</p>
        @foreach ($cartItems as $item)
        <div class="checkout-item">
            <span>{{ $item->product->productDetail->productName }}</span>
            <span>{{ $item->quantity }}</span>
            <span>Rp {{ $item->product->productPrice * $item->quantity }}</span>
        </div>
        <?php
        $value = $value + ($item->product->productPrice * $item->quantity);
        ?>
        @endforeach
        <br><br>
        <p class="h3"> Total Price : {{$value}}</p>

        <form action="{{ route('order.make') }}" method="POST">
            @csrf
            <input type="hidden" name="selectedItems" value="{{ implode(',', request()->input('selectedItems', [])) }}">
            <input type="hidden" name="addressId" value="{{ $firstAddress->addressId }}">
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</div>
@endsection
