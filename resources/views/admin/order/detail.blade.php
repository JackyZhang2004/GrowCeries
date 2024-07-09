@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/order/detail.css') }}">
@endpush

@section('title', 'Order Detail')

@section('content')

    @php
        $spendingSubtotal = 0;
    @endphp
    @foreach ($detail as $d)
        @php
            $itemTotal = $d->product->productPrice * $d->quantity;
            $spendingSubtotal += $itemTotal;
        @endphp
    @endforeach
    @php
        $packagingCosts = 1000;
        $totalPayment = $spendingSubtotal + $packagingCosts;
    @endphp

    <div class="cart-container">
        <div class="productListContainer">
            <p class="productListTitle">Order Details</p>
            <p style="width:100%;text-align:right">Order Number : {{ $order->orderId }} </p>
        </div>

        <div class="alamat">
            <div class="h4"></div>
        </div>

        <div class="timeline">
            <div class="timeline-step @if (in_array($order->orderStatus, ['Packing', 'Shipped', 'Done', 'Request Refund', 'Refunded'])) completed @else pending @endif">
                <div class="timeline-icon @if (in_array($order->orderStatus, ['Packing', 'Shipped', 'Done', 'Request Refund', 'Refunded'])) completed @else pending @endif">
                    <img src="{{ asset('image/ordered.svg') }}" alt="Icon 1" width="80%">
                </div>
                <div class="timeline-content">
                    <p class="timeline-title">Order Made</p>
                    <p class="timeline-date">{{ $order->orderDate }} </p>
                    <br>
                </div>
            </div>

            <div class="timeline-step @if (in_array($order->orderStatus, ['Packing', 'Shipped', 'Done', 'Request Refund', 'Refunded'])) completed @else pending @endif">
                <div class="timeline-icon @if (in_array($order->orderStatus, ['Packing', 'Shipped', 'Done', 'Request Refund', 'Refunded'])) completed @else pending @endif">
                    <img src="{{ asset('image/wallet.svg') }}" alt="Icon 2" width="80%">
                </div>
                <div class="timeline-content">
                    <p class="timeline-title">Order Paid</p>
                    <p class="timeline-price">Rp. {{ number_format($totalPayment, 0, ',', '.') }}</p>
                    <p class="timeline-date">{{ $order->orderDate }}</p>
                </div>
            </div>

            <div class="timeline-step @if (in_array($order->orderStatus, ['Shipped', 'Done', 'Request Refund', 'Refunded'])) completed @else pending @endif">
                <div class="timeline-icon @if (in_array($order->orderStatus, ['Shipped', 'Done', 'Request Refund', 'Refunded'])) completed @else pending @endif">
                    @if (in_array($order->orderStatus, ['Done', 'Shipped']))
                        <img src="{{ asset('image/shipped.svg') }}" alt="Icon 4" width="80%">
                    @else
                        <img src="{{ asset('image/shippedBW.svg') }}" alt="Icon 4" width="80%">
                    @endif
                </div>
                <div class="timeline-content">
                    <p class="timeline-title">Order Shipped</p>
                    <p class="timeline-date">{{ $order->deliveryTime }}</p>
                    <br>
                </div>
            </div>


            @if (in_array($order->orderStatus, ['Request Refund', 'Refunded']))
                <div class="timeline-step @if (in_array($order->orderStatus, ['Request Refund', 'Refunded'])) completed @else pending @endif">
                    <div class="timeline-icon @if (in_array($order->orderStatus, ['Request Refund', 'Refunded'])) completed @else pending @endif">
                        <img src="{{ asset('image/requestRefund.svg') }}" alt="" width="80%">
                    </div>
                    <div class="timeline-content">
                        <p class="timeline-title">Requested Refund</p>
                        <p class="timeline-date">{{ $order->deliveryTime }}</p>
                        <br>
                    </div>
                </div>

                <div class="timeline-step @if (in_array($order->orderStatus, ['Refunded'])) completed @else pending @endif">
                    <div class="timeline-icon @if (in_array($order->orderStatus, ['Refunded'])) completed @else pending @endif">
                        @if (in_array($order->orderStatus, ['Done', 'Shipped']))
                            <img src="{{ asset('image/refunded.svg') }}" alt="Icon 4" width="80%">
                        @else
                            <img src="{{ asset('image/refundedBW.svg') }}" alt="Icon 4" width="80%">
                        @endif
                    </div>
                    <div class="timeline-content">
                        <p class="timeline-title">Refunded</p>
                        <p class="timeline-date">{{ $order->deliveryTime }}</p>
                        <br>
                    </div>
                </div>


            @else
                <div class="timeline-step @if ($order->orderStatus == 'Done') completed @else pending @endif">
                    <div class="timeline-icon @if (in_array($order->orderStatus, ['Done'])) completed @else pending @endif">
                        @if ($order->orderStatus == 'Done')
                            <img src="{{ asset('image/completed.svg') }}" alt="Icon 4" width="80%">
                        @else
                            <img src="{{ asset('image/completedBW.svg') }}" alt="Icon 4" width="80%">
                        @endif
                    </div>
                    <div class="timeline-content">
                        <p class="timeline-title">Order Completed</p>
                        <p class="timeline-date">{{ $order->droppeddatetime }}</p>
                        <br>
                    </div>
                </div>
            @endif

            <div
                class="timeline-line @if ($order->orderStatus == 'Done') Completed @elseif($order->orderStatus == 'Shipped')Shipping @elseif($order->orderStatus == 'Request Refund')requestRefund @elseif($order->orderStatus == 'Refunded')Refunded @else Packing @endif">
            </div>
        </div>


        <div id="checkout-form" class="mb-5">
            <div class="cart-content">
                <div class="cartItems">
                    @foreach ($detail as $d)
                        <div class="cartItem">
                            <div class="itemDetails">
                                <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
                                    <img src="{{ $d->product->getImageURL() }}" class="card-img-top" alt="...">
                                </a>
                                <div>
                                    <a href="{{ route('productDetail', $d->product->productId) }}"
                                        class="productDetailButton">
                                        <p class="itemName h5">{{ $d->product->productDetail->productName }}</p>
                                    </a>
                                    <a href="{{ route('productDetail', $d->product->productId) }}"
                                        class="productDetailButton">
                                        <p class="itemWeight">{{ $d->product->variant }}</p>
                                    </a>
                                    <a href="{{ route('productDetail', $d->product->productId) }}"
                                        class="productDetailButton">
                                        <p class="itemWeight"> X {{ $d->quantity }} </p>
                                    </a>
                                </div>
                            </div>
                            <div class="itemActions">
                                <p class="itemPrice"> Rp. {{ number_format($d->product->productPrice, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="stickyFooter">
                    <div class="footerContent">
                        <div class="priceDetail">
                            <span>Spending Subtotal</span>
                            <span id="spendingSubtotal">Rp {{ number_format($spendingSubtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="priceDetail">
                            <span>Shipping Costs</span>
                            <span id="shippingCosts" style="color: green">Free</span>
                        </div>
                        <div class="priceDetail">
                            <span>Service Fees</span>
                            <span id="serviceFee" style="color: green">Free</span>
                        </div>
                        <div class="priceDetail">
                            <span>Packaging Costs</span>
                            <span id="packagingCosts">Rp {{ number_format(1000, 0, ',', '.') }}</span>
                        </div>
                        <br>
                        <hr>
                        <br>

                        <div class="priceDetail">
                            <span>Total Payment</span>
                            <span id="totalPayment" style="color: red;font-size:1.6rem">Rp
                                {{ number_format($totalPayment, 0, ',', '.') }}</span>
                        </div>
                        <div class="priceDetail">
                            <span>Payment Method</span>
                            <p id="mb-3"> {{ $order->paymentMethod }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
