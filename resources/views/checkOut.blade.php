@extends('layouts.app')

@push('head')
        <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endpush

@section('title', 'Checkout Page')

@section('content')
    <div class="container">
        <div class="shippingDetails">
            <h3 class="h3">Shipping Details</h3>
            <div class="addressDetails">
                @if ($addresses->count() > 0)
                    <div class="left">
                        <p class="name" name="receiverName">
                            {{ $firstAddress->receiverName }}
                        </p>
                        <p class="phone" name="phoneNumber">
                            {{ $firstAddress->phoneNumber }}
                        </p>
                        <input type="hidden" name="redirect_to" value="{{ url()->current() }}">
                        <p class="address" id="address" name="addressName">
                            {{ $firstAddress->addressName }},
                        </p>
                        <p class="address" id="addressDetail" name="addressDetail">
                            {{ $firstAddress->addressDetail }}
                        </p>
                    </div>
                    <div class="right">
                        <form method="GET" action="{{ route('address.chooseAddress') }}">
                            @foreach (request()->input('selectedItems', []) as $item)
                                <input type="hidden" name="selectedItems[]" value="{{ $item }}">
                            @endforeach
                            <input type="hidden" name="selectedDeliveryTime"
                                value="{{ request()->input('selectedDeliveryTime') }}">
                            {{-- <input type="hidden" name="addressId" value="{{ $address->addressId }}"> --}}
                            {{-- <input type="hidden" name="addressEmpty" value="ada"> --}}
                            <button type="submit" class="btn btn-secondary" style="background-color: green">Edit
                                Address</button>
                        </form>
                    </div>
                @else
                    <div class="left">
                        <p class="address" id="address">No address found. Please add an address in your profile.</p>
                    </div>
                    <div class="right">
                        <a href="{{ route('address.create') }}" class="btn btn-primary">Add New Address</a>
                    </div>
                @endif
            </div>
            Will be delivered
            <p class="timeDetails"> {{ $selectedDeliveryTime }}</p>
            @error('addressEmpty')
                <p>Please choose Address!</p>
            @enderror
            {{-- <p id="error-message-adr" style="color: red; display: none;"><br> Please select your address.</p> --}}
        </div>
        <form action="{{ route('checkout.add') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            @if ($addresses->count() > 0)
                <input type="hidden" name="addressEmpty" value="ada">
            @else
                <input type="hidden" name="addressEmpty" value="">
            @endif
            <div class="orderedProducts">
                <h3 class="h3">Ordered Products</h3>
                <br>
                <div class="productList">
                    @foreach ($cartItems as $item)
                        <input type="hidden" name="selectedItems[]" value="{{ $item->productId }}">
                        <div class="checkoutProduct">
                            <div class="productImage">
                                <img class="pdImg" src="{{ asset('image/gambarRectangle.png') }}" alt="">
                            </div>
                            <div class="productDetails">
                                <span class="prodName">{{ $item->product->productDetail->productName }}</span>
                                <span class="prodPricePc">{{ $item->product->productPrice }}/pc</span>
                                <span class="prodQuant">x{{ $item->quantity }}</span>
                            </div>
                            <div class="productPrice">
                                <span>Rp <span
                                        class="itemTotal">{{ $item->product->productPrice * $item->quantity }}</span></span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="priceDetail">
                    <span>Spending Subtotal</span>
                    <span id="spendingSubtotal">Rp 0</span>
                </div>
                <div class="priceDetail">
                    <span>Shipping Costs</span>
                    <span id="shippingCosts">Free</span>
                </div>
                <div class="priceDetail">
                    <span>Service Fees</span>
                    <span id="serviceFee">Free</span>
                </div>
                <div class="priceDetail">
                    <span>Packaging Costs</span>
                    <span id="packagingCosts">Rp 1000</span>
                </div>
                <br>
                <hr>
                <br>
                <div class="priceDetail">
                    <span>Total Payment</span>
                    <span id="totalPayment">Rp 0</span>
                </div>
            </div>
            <div class="paymentMethods">
                <h3 class="h3">Payment Methods</h3>
                <br>
                <div class="paymentOptions">
                    <label>
                        <input type="radio" name="optionPayment" value="Bank Transfer">
                        Bank Transfer
                    </label>
                    <label>
                        <input type="radio" name="optionPayment" value="ShopeePay">
                        ShopeePay
                    </label>
                    <label>
                        <input type="radio" name="optionPayment" value="Credit Card">
                        Credit Card
                    </label>
                    @error('optionPayment')
                        <p>Please select a payment method!</p>
                    @enderror
                </div>
                {{-- <p id="error-message-pay" style="color: red; display: none;">Please select a payment method.</p> --}}
                @if ($addresses->count() > 0)
                    <input type="hidden" name="addressId" value="{{ $firstAddress->addressId }}">
                @endif
                <input type="hidden" name="deliveryTime" value="{{ $selectedDeliveryTime }}">
                <button type="submit" class="btn btn-secondary" style="background-color: green">Make Order</button>
            </div>
        </form>
    </div>
    <!-- Pop-up and Overlay -->
    <div class="popup-overlay" id="popup-overlay"></div>
    <div class="popup" id="popup">
        <p>Order placed successfully!</p>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/checkOut.js') }}"></script>
@endsection
