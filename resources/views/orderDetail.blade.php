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
            <div class="top">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnit">
                    <div class="icon">
                        <img src="{{asset('image/shipped.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLine">
                <div class="iconUnit">
                    <div class="icon">
                        <img src="{{asset('image/completedBW.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="explainUnitPaid">
                    <p>Order Paid at :</p>
                    <p> {{$order->created_at}}</p>
                </div>
                <div class="explainUnitPacking">
                    <p>Packing Your Order</p>
                </div>
            </div>
        </div>
    @elseif($order->orderStatus == 'Shipped')
        <div class="packing">
            <div class="top">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/shipped.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnit">
                    <div class="icon">
                        <img src="{{asset('image/completedBW.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="explainUnitPaid">
                    <p>Order Paid at :</p>
                    <p> {{$order->created_at}}</p>
                </div>
                <div class="explainUnitPacking">
                    <p>Packing Your Order</p>
                </div>
                <div class="explainUnitShipped">
                    <p>Order Shipped at :</p>
                    <p> {{$order->deliveryTime}}</p>
                </div>
            </div>
        </div>
    @elseif($order->orderStatus == 'Done')
        <div class="packing">
            <div class="top">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/shipped.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/completedBW.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="explainUnitPaid">
                    <p>Order Paid at :</p>
                    <p> {{$order->created_at}}</p>
                </div>
                <div class="explainUnitPacking">
                    <p>Packing Your Order</p>
                </div>
                <div class="explainUnitShipped">
                    <p>Order Shipped at :</p>
                    <p> {{$order->deliveryTime}}</p>
                </div>
                <div class="explainUnitDone">
                    <p>Order Completed</p>
                    <p> {{$order->droppeddatetime}}</p>
                </div>
            </div>
        </div>
    @elseif($order->orderStatus == 'Request Refund')
        <div class="packing">
            <div class="top">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/shipped.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/completedBW.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/requestRefund.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnit">
                    <div class="icon">
                        <img src="{{asset('image/refunded.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="explainUnitPaid2">
                    <p>Order Paid at :</p>
                    <p> {{$order->created_at}}</p>
                </div>
                <div class="explainUnitPacking2">
                    <p>Packing Your Order</p>
                </div>
                <div class="explainUnitShipped2">
                    <p>Order Shipped at :</p>
                    <p> {{$order->deliveryTime}}</p>
                </div>
                <div class="explainUnitDone2">
                    <p>Order Completed</p>
                    <p> {{$order->droppeddatetime}}</p>
                </div>
                <div class="explainUnitRequest2">
                    <p>Refund In-Progress</p>
                </div>
            </div>
        </div>
    @elseif($order->orderStatus == 'Refunded' || $order->orderStatus == 'Rejected')
        <div class="packing">
            <div class="top">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/shipped.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/completedBW.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/requestRefund.svg')}}" alt="">
                    </div>
                </div>
                <hr class="horizontalLineComplete">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        @if ($order->orderStatus == 'Refunded')
                            <img src="{{asset('image/refunded.svg')}}" alt="">
                        @elseif($order->orderStatus == 'Rejected')
                            <img src="{{asset('image/rejected.svg')}}" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="explainUnitPaid2">
                    <p>Order Paid at :</p>
                    <p> {{$order->created_at}}</p>
                </div>
                <div class="explainUnitPacking2">
                    <p>Packing Your Order</p>
                </div>
                <div class="explainUnitShipped2">
                    <p>Order Shipped at :</p>
                    <p> {{$order->deliveryTime}}</p>
                </div>
                <div class="explainUnitDone2">
                    <p>Order Completed</p>
                    <p> {{$order->droppeddatetime}}</p>
                </div>
                <div class="explainUnitRequest2">
                    <p>Refund In Progress</p>
                </div>
                <div class="explainUnitRefund2">
                    @if ($order->orderStatus == 'Refunded')
                        <p>Refund Accepted</p>
                    @elseif($order->orderStatus == 'Rejected')
                        <p>Refund Request Rejected</p>
                    @endif
                </div>
            </div>
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
