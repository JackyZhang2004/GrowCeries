@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('title', 'Cart Page')

@section('content')
    <p class="h1">Test Cart Page</p>

    <form action="{{ route('checkout') }}" method="GET" id="checkout-form">
        <table class="table table-striped">
            <tr>
                <th>
                    <input type="checkbox" id="checkAll"> <!-- Master Checkbox -->
                </th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            @foreach ($cartItems as $cartItem)
                <tr>
                    <td>
                        <input type="checkbox" class="checkboxItem" name="selectedItems[]" value="{{ $cartItem->product->productId }}" @if(is_array(old('selectedItems')) && in_array($cartItem->product->productId, old('selectedItems'))) checked @endif>
                    </td>
                    <td>{{$cartItem->product->productDetail->productName}}</td>
                    <td class="item-price">{{$cartItem->product->productPrice}}</td>
                    <td class="item-quantity">{{$cartItem->quantity}}</td>
                </tr>
            @endforeach
        </table>
        
        <p class="h3"> Total Price : <span id="totalPrice">0</span></p>
        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
    </form>
@endsection

@section('script')
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection
