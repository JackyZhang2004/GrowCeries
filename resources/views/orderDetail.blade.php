@extends('layouts.app')

@section('title', 'Order Detail')

@push('head')
    <link rel="stylesheet" href="{{ asset('css\orderDetail.css') }}">
@endpush

@section('content')
    <h1 class="title">Your Order Status</h1>
    <p class="orderId">Order Id : {{ $order->orderId }}</p>
    @if ($order->orderStatus == 'Packing')
        <div class="packing">
            <div class="icon">
                <img src="" alt="">
            </div>
            <hr class="horizontalLine">
            <div></div>

        </div>
    @endif
    <hr class="sectionLine">
    <h1 class="title">Order List</h1>
    <div class="orderList">
        @foreach ($orderDetail as $detail)
            <div class="unit">
                <div class="left">
                    <img src="{{ asset('image/apel.png') }}" alt="" class="productImage">
                </div>
                <div class="mid">
                    <p class="productName">{{ $detail->product->productName }}</p>
                    <p class="amount">X {{ $detail->quantity }}</p>
                </div>
                <div class="right">
                    <p class="productPrice">Rp. {{ $detail->product->productPrice }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <hr class="sectionLine">
    <div class="paymentDetail">
        <div class="paymentDetailLeft">
            <p class="title">Address Details</p>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Receiver Name</p>
                <p class="paymentDetailAns"> : {{ $order->address->receiverName }}</p>
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Phone Number</p>    
                <p class="paymentDetailAns"> : {{ $order->address->phoneNumber }}</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Location Details</p>
                <p class="paymentDetailAns"> : {{ $order->address->addressDetail }}</p>   
            </div>
        </div>
        <div class="paymentDetailRight">
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Spending Subtotal</p>    
                <p class="paymentDetailAns">{{ $order->address->phoneNumber }}</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Shipping Cost</p>
                <p class="paymentDetailAnsFree">Free</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Service Fees</p>
                <p class="paymentDetailAnsFree">Free</p>
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Packaging Cost</p>    
                <p class="paymentDetailAns">Rp. 1.000</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Total Payment</p>
                <p class="paymentDetailAnsPrice">Rp. {{{ $totalPrice +1000}}}</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Payment Method</p>
                <p class="paymentDetailAns">{{$order->paymentMethod}}</p>   
            </div>
        </div>
    </div>
    <hr class="sectionLine">


@endsection
