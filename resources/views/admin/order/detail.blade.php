@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/order/detail.css') }}">
@endpush

@section('title', 'Order Detail')

@section('content')

    <div class="cart-container">
        <div class="productListContainer">
            <p class="productListTitle">Order Details</p>
            <p style="width:100%;text-align:right">Order Number : {{$order->orderId}} </p>
        </div>

        <div class="timeline">
            <div class="timeline-step completed">
                <div class="timeline-icon">
                    <img src="path/to/icon1.png" alt="Icon 1">
                </div>
                <div class="timeline-content">
                    <p class="timeline-title">Pesanan Dibuat</p>
                    <p class="timeline-date">25-06-2024 16:36</p>
                </div>
            </div>
            <div class="timeline-step completed">
                <div class="timeline-icon">
                    <img src="path/to/icon2.png" alt="Icon 2">
                </div>
                <div class="timeline-content">
                    <p class="timeline-title">Pesanan Dibayarkan</p>
                    <p class="timeline-price">(Rp28.300)</p>
                    <p class="timeline-date">25-06-2024 16:37</p>
                </div>
            </div>
            <div class="timeline-step completed">
                <div class="timeline-icon">
                    <img src="path/to/icon3.png" alt="Icon 3">
                </div>
                <div class="timeline-content">
                    <p class="timeline-title">Pesanan Dikirimkan</p>
                    <p class="timeline-date">26-06-2024 15:16</p>
                </div>
            </div>
            <div class="timeline-step completed">
                <div class="timeline-icon">
                    <img src="path/to/icon4.png" alt="Icon 4">
                </div>
                <div class="timeline-content">
                    <p class="timeline-title">Pesanan Selesai</p>
                    <p class="timeline-date">28-06-2024 12:23</p>
                </div>
            </div>
            <div class="timeline-step">
                <div class="timeline-icon">
                    <img src="path/to/icon5.png" alt="Icon 5">
                </div>
                <div class="timeline-content">
                    <p class="timeline-title">Pesanan Dinilai</p>
                    <p class="timeline-date">28-06-2024 12:24</p>
                </div>
            </div>
            <div class="timeline-line"></div> <!-- Moved to the end -->
        </div>

        <div id="checkout-form" class="mb-5">
            <div class="cart-content">
                <div class="cartItems">
                    @php
                        $spendingSubtotal = 0;
                    @endphp
                    @foreach ($detail as $d)
                    @php
                        $itemTotal = $d->product->productPrice * $d->quantity;
                        $spendingSubtotal += $itemTotal;
                    @endphp
                    <div class="cartItem">
                        <div class="itemDetails">
                            <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
                                <img src="{{ $d->product->getImageURL() }}" class="card-img-top" alt="...">
                            </a>
                            <div>
                                <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
                                    <p class="itemName h5">{{$d->product->productDetail->productName}}</p>
                                </a>
                                <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
                                    <p class="itemWeight">{{$d->product->variant}}</p>
                                </a>
                                <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
                                    <p class="itemWeight"> X {{$d->quantity}} </p>
                                </a>
                            </div>
                        </div>
                        <div class="itemActions">
                            <p class="itemPrice"> Rp. {{ number_format($d->product->productPrice, 0, ',', '.') }}</p>
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
                        <div class="priceDetail" >
                            <span>Service Fees</span>
                            <span id="serviceFee" style="color: green">Free</span>
                        </div>
                        <div class="priceDetail" >
                            <span>Packaging Costs</span>
                            <span id="packagingCosts">Rp {{ number_format(1000, 0, ',', '.') }}</span>
                        </div>
                        <br>
                        <hr>
                        <br>
                        @php
                            $packagingCosts = 1000;
                            $totalPayment = $spendingSubtotal + $packagingCosts;
                        @endphp
                        <div class="priceDetail">
                            <span>Total Payment</span>
                            <span id="totalPayment" style="color: red;font-size:1.6rem">Rp {{ number_format($totalPayment, 0, ',', '.') }}</span>
                        </div>
                        <div class="priceDetail">
                            <span>Payment Method</span>
                            <p id="mb-3"> {{ $order->paymentMethod}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
