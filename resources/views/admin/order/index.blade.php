@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/order/index.css') }}">
@endpush

@section('title', 'Order')

@section('content')

    <div class="container">
        <div class="searchContainer">
            <p class="searchTitle">Find Order Here ...</p>
            {{-- <form action="{{route('admin.searchProduct')}}" method="GET"> --}}
            <input type="text" placeholder="Input product code here..." class="searchField" id ="searchField"
                oninput=searchFunction($product)>
            {{-- </form> --}}
        </div>
        <div class="productListContainer">
            <p class="productListTitle">Order List</p>
            {{-- @foreach ($orders as $list)
                <div class="OrderUnit">
                    <div class="unitTop">
                        @if ($list->orderStatus == 'Packing')
                            <div class="topLeft">
                                <img src="{{ asset('image/packed.svg') }}" alt="">
                            </div>
                            <div class="topMid">
                                <p class="status">Order is being Packed</p>
                                <p class="purchaseDate">Purchased at {{ $list->orderDate }}</p>
                                <p class="productPurchased">{{ $list->orderList->quantity }}</p>
                            </div>
                        @elseif($list->orderStatus == 'Shipped')
                            <div class="topLeft">
                                <img src="{{ asset('image/shipped.svg') }}" alt="">
                            </div>
                            <div class="topMid">
                                <p class="status">Order is being Shipped</p>
                                <p class="purchaseDate">Purchased at {{ $list->orderDate }}</p>
                                <p class="productPurchased">{{ $list->orderList->quantity }}</p>
                            </div>
                        @elseif($list->orderStatus == 'Done')
                            <div class="topLeft">
                                <img src="{{ asset('image/packed.svg') }}" alt="">
                            </div>
                            <div class="topMid">
                                <p class="status">Order is Arrived</p>
                                <p class="purchaseDate">Purchased at {{ $list->orderDate }}</p>
                                <p class="productPurchased">{{ $list->orderList->quantity }}</p>
                            </div>
                        @elseif($list->orderStatus == 'Refund')
                            <div class="topLeft">
                                <img src="{{ asset('image/packed.svg') }}" alt="">
                            </div>
                            <div class="topMid">
                                <p class="status">Refund has already Requested</p>
                                <p class="purchaseDate">Purchased at {{ $list->orderDate }}</p>
                                <p class="productPurchased">{{ $list->orderList->quantity }}</p>
                            </div>
                        @endif
                        <div class="topRight">
                            <p class="totalPrice">{{ $list->price }}</p>
                        </div>
                    </div>
                    <div class="unitBottom">
                        <button onclick= "" class="button1">View Order Details</button>
                    </div>
                </div>
            @endforeach --}}
            @foreach ($orders as $o)
                <p> Transaction {{$o->orderId}} </p>
                @foreach ($o->orderList as $list)
                <p> Product Id : {{ $list->productId }}, Quantity : {{ $list->quantity}} </p>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
