@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/productDetail.css') }}">
@endpush

@section('title', 'Product Detail')

@section('content')
    {{-- <p>tes product detail page</p> --}}
    {{-- <p>{{$product}}</p>
    <p>{{$product->productDetail}}</p> --}}

    <div class="container">
        <div class="product-detail">
            <div class="product-images">
                <img src="{{ asset('image/gambarRectangle.png') }}" alt="Semangka" class="main-image">
            </div>
            <div class="product-info">
                <p class="h1">{{ $product->productDetail->productName }} {{ $product->variant }}gr</p>
                @if ( $product->stock > 0 )
                    <span class="status in-stock">In Stock</span>

                @else
                    <span class="status outOfStock">Out Of Stock</span>

                @endif
                <div class="price">Rp. {{ number_format($product->productPrice, 0, ',', '.') }}</div>
                <p class="description">
                    A quintessential taste of summer, watermelon is a vibrantly colored fruit that's both delicious and
                    hydrating. Its smooth, deep red flesh is encased in a thick green rind ...
                </p>
                @php
                    $cartItem = $cartItems->firstWhere('productId', $product->productId);
                @endphp

                @if (is_null($cartItem) || $cartItem->quantity == 0)
                    <!-- ADD Button -->
                    <a href="{{ url('add-cart', $product->productId) }}" type="button" class="add-to-cart">ADD TO CART</a>
                @else
                    <!-- Increment and Decrement Buttons -->
                    <div class="quantityControl">
                        <form action="{{ route('cart.decrement', $product->productId) }}" method="POST"
                            class="d-inline plesMines">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary quantity-btn">-</button>
                        </form>
                        <span class="quantity mx-2">{{ $cartItem->quantity }}</span>
                        <form action="{{ route('cart.increment', $product->productId) }}" method="POST"
                            class="d-inline plesMines">
                            @csrf
                            <button type="submit" class="btn btn-outline-success quantity-btn">+</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        <div class="details">

            <button class="accordion">Details</button>
            <div class="panel">
                <div class="row">
                    <div class="col-sm">
                        <p> Stock : {{$product->stock}}gr </p>
                    </div>
                    <div class="col-sm" style="border-left: 1px solid">
                        <p> Variant : {{$product->variant}}gr </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p> Shelf Life : {{$product->productDetail->shelfLife}} </p>
                    </div>
                    <div class="col-sm" style="border-left: 1px solid">
                        <p> Origin : {{$product->productDetail->origin}} </p>
                    </div>
                </div>
            </div>

            <button class="accordion">Nutrition Information</button>
            <div class="panel">
                <div class="row">
                    <div class="col-sm">
                        <p> Calories : {{$product->productDetail->calories}}gr </p>
                    </div>
                    <div class="col-sm" style="border-left: 1px solid">
                        <p> Fat : {{$product->productDetail->fat}}gr </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p> Sugar : {{$product->productDetail->sugar}}gr </p>
                    </div>
                    <div class="col-sm" style="border-left: 1px solid">
                        <p> Carbohydrate : {{$product->productDetail->carbohydrate}}gr </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p> Protein : {{$product->productDetail->protein}}gr </p>
                    </div>
                    <div class="col-sm" style="border-left: 1px solid">
                        <p> Product Category : {{$product->productDetail->productCategory}} </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="similar-products">
            <h2>Similar Product</h2>
            <div class="similar-product-list">
                <div class="product-item">
                    <img src="{{ asset('image/gambarRectangle.png') }}" alt="Similar Product">
                </div>
                <div class="product-item">
                    <img src="{{ asset('image/gambarRectangle.png') }}" alt="Similar Product">
                </div>
                <div class="product-item">
                    <img src="{{ asset('image/gambarRectangle.png') }}" alt="Similar Product">
                </div>
                <div class="product-item">
                    <img src="{{ asset('image/gambarRectangle.png') }}" alt="Similar Product">
                </div>
            </div>
        </div> --}}
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/productDetail.js') }}"></script>
@endsection
