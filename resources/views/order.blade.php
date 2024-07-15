@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endpush

@section('title', 'My Orders')

@section('content')
    <div class="container">
        @if ($orders->isEmpty())
            <p>No orders found.</p>
        @else
            <div class="orderTypeButton">
                @if ($category == "Current")
                    <a href="{{ route('order', ['category' => "Current"])}}" class="orderButtonMark" style="text-decoration: none">Current Order</a>
                    <a href="{{ route('order', ['category' => "Done"])}}" class="orderButton" style="text-decoration: none">Order History</a>
                    <a href="{{ route('order', ['category' => "Refund"])}}" class="orderButton" style="text-decoration: none">Refund</a>
                @elseif ($category == "Done")
                    <a href="{{ route('order', ['category' => "Current"])}}" class="orderButton" style="text-decoration: none">Current Order</a>
                    <a href="{{ route('order', ['category' => "Done"])}}" class="orderButtonMark" style="text-decoration: none">Order History</a>
                    <a href="{{ route('order', ['category' => "Refund"])}}" class="orderButton" style="text-decoration: none">Refund</a>
                @else
                    <a href="{{ route('order', ['category' => "Current"])}}" class="orderButton" style="text-decoration: none">Current Order</a>
                    <a href="{{ route('order', ['category' => "Done"])}}" class="orderButton" style="text-decoration: none">Order History</a>
                    <a href="{{ route('order', ['category' => "Refund"])}}" class="orderButtonMark" style="text-decoration: none">Refund</a>
                @endif
            </div>
            <div class="orderType">
                <div class="Order">
                    @foreach ($orders as $list)
                        @if ($category == "Current")
                            @if ($list->orderStatus == "Packing")
                                <div class="OrderUnit">
                                    <div class="unitTop">
                                        <div class="topLeft">
                                            <img src="{{asset('image/packing.svg')}}" alt="">
                                        </div>
                                        <div class="topMid">
                                            <p class="status">Order is being Packed</p>
                                            <p class="purchaseDate">Purchased at {{$list->orderDate}}</p>
                                            <p class="productPurchased mb-1">Item Bought : {{ $list->orderList->count() }}</p>
                                        </div>
                                        <div class="topRight">
                                            <p class="totalPrice">{{$list->price}}</p>
                                        </div>
                                    </div>
                                    <div class="unitBottom">
                                        <a href= "{{route('orderDetail', $list->orderId)}}" class="button1">View Order Details</a>
                                        <a href= "{{route('deleteOrder', $list->orderId)}}" class="button2">Cancel Order</a>
                                    </div>
                                </div>
                            @elseif($list->orderStatus == "Shipped")
                                <div class="OrderUnit">
                                    <div class="unitTop">
                                        <div class="topLeft">
                                            <img src="{{asset('image/shipped.svg')}}" alt="">
                                        </div>
                                        <div class="topMid">
                                            <p class="status">Order is being Shipped</p>
                                            <p class="purchaseDate">Purchased at {{$list->orderDate}}</p>
                                            <p class="productPurchased mb-1">Item Bought : {{ $list->orderList->count() }}</p>
                                        </div>
                                        <div class="topRight">
                                            <p class="totalPrice">{{$list->price}}</p>
                                        </div>
                                    </div>
                                    <div class="unitBottom">
                                        <a href= "{{route('orderDetail', $list->orderId)}}" class="button1">View Order Details</a>
                                        <a href= "{{route('deleteOrder', $list->orderId)}}" class="button2">Cancel Order</a>
                                    </div>
                                </div>
                            @endif
                        @elseif ($category == "Done")
                            @if($list->orderStatus == "Done")
                                <div class="OrderUnit">
                                    <div class="unitTop">
                                        <div class="topLeft">
                                            <img src="{{asset('image/completed.svg')}}" alt="">
                                        </div>
                                        <div class="topMid">
                                            <p class="status">Order is Arrived</p>
                                            <p class="purchaseDate">Purchased at {{$list->orderDate}}</p>
                                            <p class="productPurchased mb-1">Item Bought : {{ $list->orderList->count() }}</p>

                                        </div>
                                        <div class="topRight">
                                            <p class="totalPrice">{{$list->price}}</p>
                                        </div>
                                    </div>
                                    <div class="unitBottom">
                                        <a href= "{{route('orderDetail', $list->orderId)}}" class="button1">View Order Details</a>
                                        <a href= "{{route('refund', $list->orderId)}}" class="button2">Refund</a>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    @if($category == "Refund")
                        @foreach ($orders as $list)
                            @if($list->orderStatus == "Request Refund")
                                <div class="OrderUnit">
                                    <div class="unitTop">
                                        <div class="topLeft">
                                            <img src="{{asset('image/requestRefund.svg')}}" alt="">
                                        </div>
                                        <div class="topMid">
                                            <p class="status">Your Refund has been requested</p>
                                            <p class="purchaseDate">Purchased at {{$list->orderDate}}</p>
                                            <p class="productPurchased mb-1">Item Bought : {{ $list->orderList->count() }}</p>
                                        </div>
                                        <div class="topRight">
                                            <p class="totalPrice">{{$list->price}}</p>
                                        </div>
                                    </div>
                                    <div class="unitBottom">
                                        <a href= "{{route('orderDetail', $list->orderId)}}" class="button1">View Order Details</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @foreach ($orders as $list)
                            @if($list->orderStatus == "Refunded")
                                <div class="OrderUnit">
                                    <div class="unitTop">
                                        <div class="topLeft">
                                            <img src="{{asset('image/refunded.svg')}}" alt="">
                                        </div>
                                        <div class="topMid">
                                            <p class="status">Your Refund has been approved</p>
                                            <p class="purchaseDate">Purchased at {{$list->orderDate}}</p>
                                            <p class="productPurchased mb-1">Item Bought : {{ $list->orderList->count() }}</p>
                                        </div>
                                        <div class="topRight">
                                            <p class="totalPrice">{{$list->price}}</p>
                                        </div>
                                    </div>
                                    <div class="unitBottom">
                                        <a href= "{{route('orderDetail', $list->orderId)}}" class="button1">View Order Details</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection
