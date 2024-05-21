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
            <ul>
                @foreach ($orders as $order)
                    <li>
                        Order Date: {{ $order->orderDate }}<br>
                        Total Price: {{ $order->transaction }}<br>
                        Status: {{ $order->orderStatus }} <br>
                        Total Product : {{$order->orderList->count()}} <br> <br>
                        {{-- <ul>
                            @foreach ($order->orderList as $detail)
                                <li>
                                    Product: {{ $detail->product->productName }}<br>
                                    Quantity: {{ $detail->product->quantity }}<br>
                                    Price: {{ $detail->product->productPrice }}
                                </li>
                            @endforeach
                        </ul> --}}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
