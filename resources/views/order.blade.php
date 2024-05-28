@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endpush

@section('title', 'My Orders')

@section('content')
    <div class="container">
        {{-- <h1 class="h1">My Orders</h1> --}}
        {{-- @if ($orders->isEmpty())
            <p>No orders found.</p>
        @else --}}
            <div class="Order">
                <p class="OrderTitle">Current Order</p>
                <div class="OrderUnit">
                    <div class="unitTop">
                        <div class="topLeft">
                            <img src="image/packed.svg" alt="">
                        </div>
                        <div class="topMid">
                            <p class="status">Order is being packed</p>
                            <p class="purchaseDate">Purchased April 23, 2024</p>
                            <p class="productPurchased">3 Product ></p>
                        </div>
                        <div class="topRight">
                            <p class="totalPrice">Rp. 72.000</p>
                        </div>
                    </div>
                    <div class="unitBottom">
                        <button onclick= "" class="button1">View Order Details</button>
                        <button onclick= "" class="button2">Cancel Order</button>
                    </div>
                </div>
                <div class="OrderUnit">
                    <div class="unitTop">
                        <div class="topLeft">
                            <img src="image/packed.svg" alt="">
                        </div>
                        <div class="topMid">
                            <p class="status">Order is being packed</p>
                            <p class="purchaseDate">Purchased April 23, 2024</p>
                            <p class="productPurchased">3 Product ></p>
                        </div>
                        <div class="topRight">
                            <p class="totalPrice">Rp. 72.000</p>
                        </div>
                    </div>
                    <div class="unitBottom">
                        <button onclick= "" class="button1">View Order Details</button>
                        <button onclick= "" class="button2">Cancel Order</button>
                    </div>
                </div>
            </div>
            <div class="Order">
                <p class="OrderTitle">Completed Order</p>
                <div class="OrderUnit">
                    <div class="unitTop">
                        <div class="topLeft">
                            <img src="image/packed.svg" alt="">
                        </div>
                        <div class="topMid">
                            <p class="status">Order is being packed</p>
                            <p class="purchaseDate">Purchased April 23, 2024</p>
                            <p class="productPurchased">3 Product ></p>
                        </div>
                        <div class="topRight">
                            <p class="totalPrice">Rp. 72.000</p>
                        </div>
                    </div>
                    <div class="unitBottom">
                        <button onclick= "" class="button1">View Order Details</button>
                        <button onclick= "" class="button2">Cancel Order</button>
                    </div>
                </div>
                <div class="OrderUnit">
                    <div class="unitTop">
                        <div class="topLeft">
                            <img src="image/packed.svg" alt="">
                        </div>
                        <div class="topMid">
                            <p class="status">Order is being packed</p>
                            <p class="purchaseDate">Purchased April 23, 2024</p>
                            <p class="productPurchased">3 Product ></p>
                        </div>
                        <div class="topRight">
                            <p class="totalPrice">Rp. 72.000</p>
                        </div>
                    </div>
                    <div class="unitBottom">
                        <button onclick= "" class="button1">View Order Details</button>
                        <button onclick= "" class="button2">Cancel Order</button>
                    </div>
                </div>
            </div>
        {{-- @endif --}}
    </div>
@endsection
