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
            <div class="orderType">
                <div class="orderTypeButton">
                    <a href="" class="orderButton">Current Order</a>
                    <a href="" class="orderButton">Order History</a>
                    <a href="" class="orderButton">Refund</a>
                </div>
                <div class="Order">
                    @foreach ($orders as $list)
                        <div class="OrderUnit">
                            <div class="unitTop">
                                @if ($list->orderStatus == "Packing")
                                    <div class="topLeft">
                                        <img src="image/packed.svg" alt="">
                                    </div>
                                    <div class="topMid">
                                        <p class="status">Order is being Packed</p>
                                        <p class="purchaseDate">Purchased at {{$list->orderDate}}</p>
                                        <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}</p>

                                    </div>
                                @elseif($list->orderStatus == "Shipped")
                                    <div class="topLeft">
                                        <img src="image/packed.svg" alt="">
                                    </div>
                                    <div class="topMid">
                                        <p class="status">Order is being Shipped</p>
                                        <p class="purchaseDate">Purchased at {{$list->orderDate}}</p>
                                        <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}</p>

                                    </div>
                                @elseif($list->orderStatus == "Done")
                                    <div class="topLeft">
                                        <img src="image/packed.svg" alt="">
                                    </div>
                                    <div class="topMid">
                                        <p class="status">Order is Arrived</p>
                                        <p class="purchaseDate">Purchased at {{$list->orderDate}}</p>
                                        <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}</p>

                                    </div>
                                @elseif($list->orderStatus == "Refund")
                                    <div class="topLeft">
                                        <img src="image/packed.svg" alt="">
                                    </div>
                                    <div class="topMid">
                                        <p class="status">Refund has already Requested</p>
                                        <p class="purchaseDate">Purchased at {{$list->orderDate}}</p>
                                        <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}</p>

                                    </div>
                                @endif
                                <div class="topRight">
                                    <p class="totalPrice">{{$list->price}}</p>
                                </div>
                            </div>
                            <div class="unitBottom">
                                <button onclick= "" class="button1">View Order Details</button>
                                <button onclick= "" class="button2">Cancel Order</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
