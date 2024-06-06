@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endpush

@section('title', 'Checkout Page')

@section('content')
<div class="container">
    <h1 class="h1">Checkout</h1>
    <div class="shippingDetails">
        <h3 class="h3">Shipping Details</h3>
        <div class="addressDetails">
            @if ($addresses->count() > 0)
                <div class="left">
                    <p class="name">
                        {{ $firstAddress->receiverName }}
                    </p>
                    <p class="phone">
                        {{ $firstAddress->phoneNumber }}
                    </p>
                    <input type="hidden" name="redirect_to" value="{{ url()->current() }}">
                    <p class="address">
                       {{ $firstAddress->addressName }}, {{ $firstAddress->addressDetail }}
                    </p>
                </div>
                <div class="right">
                    <form method="GET" action="{{ route('address.chooseAddress') }}">
                        @foreach (request()->input('selectedItems', []) as $item)
                            <input type="hidden" name="selectedItems[]" value="{{ $item }}">
                        @endforeach
                        <input type="hidden" name="selectedDeliveryTime" value="{{ request()->input('selectedDeliveryTime') }}">
                        {{-- <input type="hidden" name="addressId" value="{{ $address->addressId }}"> --}}
                        <button type="submit" class="btn btn-secondary">Edit Address</button>
                    </form>
                </div>
            @else
                <div class="left">
                    <p class="address">No address found. Please add an address in your profile.</p>
                </div>
                <div class="right">
                    <a href="{{ route('address.create') }}" class="btn btn-primary">Add New Address</a>
                </div>
            @endif  
        </div>
        <p class="timeDetails">Will be delivered {{ $selectedDeliveryTime }}</p>
    </div>
    <div class="orderedProducts">
        <h3 class="h3">Ordered Products</h3>
        <br>
        <div class="productList">
            @foreach ($cartItems as $item)
                <div class="checkoutProduct">
                    <div class="productImage">
                        <img class="pdImg" src="{{asset('image/gambarRectangle.png')}}" alt="">
                    </div>
                    <div class="productDetails">
                        <span class="prodName">{{ $item->product->productDetail->productName }}</span>
                        <span class="prodPricePc">{{ $item->product->productPrice }}/pc</span>
                        <span class="prodQuant">x{{ $item->quantity }}</span>
                    </div>
                    <div class="productPrice">
                        <span>Rp {{ $item->product->productPrice * $item->quantity }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <div class="priceDetail">
            <span>Spending Subtotal</span>
            <span id="">Rp 500000</span>
        </div>
        <div class="priceDetail">
            <span>Shipping Costs</span>
            <span id="">Free</span>
        </div>
        <div class="priceDetail">
            <span>Service Fees</span>
            <span id="">Free</span>
        </div>
        <div class="priceDetail">
            <span>Packaging Costs</span>
            <span id="">Free</span>
        </div>
        <br>
        <hr>
        <br>
        <div class="priceDetail">
            <span>Total Payment</span>
            <span id="">Rp 1000000</span>
        </div>
    </div>
    <div class="paymentMethods">
        <h3 class="h3">Payment Methods</h3>
        <br>
        <form id="myForm">
            <div class="paymentOptions">
                <label>
                    <input type="radio" name="option" value="Option 1">
                    Bank Transfer
                </label>
                <label>
                    <input type="radio" name="option" value="Option 2">
                    ShopeePay
                </label>
                <label>
                    <input type="radio" name="option" value="Option 3">
                    Bank Transfer
                </label>
            </div>
            <button type="button" onclick="storeValue()">Submit</button>
        </form>
    </div>

</div>
@endsection

@section('script')
    <script src="{{ asset('js/checkOut.js') }}"></script>
@endsection