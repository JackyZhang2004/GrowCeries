@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/order/index.css') }}">
@endpush

@section('title', 'Order')

@section('content')

    <div class="container">
        <div class="searchContainer">
            <p class="searchTitle">Find Order Here ...</p>
            <input type="text" placeholder="Input order id here..." class="searchField" id="searchField"
                oninput="searchFunction($product)">
        </div>
        <div class="productListContainer">
            <p class="productListTitle">Order List</p>
            <div class="orderTypeButton tab">
                <button class="orderButton tablinks" onclick="openOrder(event, 'inProgress')">In Progress</button>
                <button class="orderButton tablinks" onclick="openOrder(event, 'done')">Done</button>
                <button class="orderButton tablinks" onclick="openOrder(event, 'requestRefund')">Request Refund</button>
            </div>

            <div id="inProgress" class="Order tabcontent">
                @foreach ($orders as $list)
                    @if (in_array($list->orderStatus, ['Packing', 'Shipped']))
                        <div class="OrderUnit">
                            <div class="unitTop">
                                <div class="topLeft">
                                    <img src="{{ asset('image/' . strtolower($list->orderStatus) . '.svg') }}"
                                        alt="">
                                </div>
                                <div class="topMid">
                                    <p class="status">Order Id : {{ $list->orderId }} </p>
                                    <p class="status">Order is being {{ $list->orderStatus }}</p>
                                    <p class="purchaseDate">Purchased at {{ $list->orderDate }}</p>
                                    <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}</p>
                                </div>
                                <div class="topRight">
                                    <p class="totalPrice">{{ $list->price }}</p>
                                </div>
                            </div>
                            <div class="unitBottom">
                                <a href="{{ route('admin.orderDetail', $list->orderId) }}" class="button1">View Order
                                    Details</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div id="done" class="Order tabcontent">
                @foreach ($orders as $list)
                    @if ($list->orderStatus == 'Done')
                        <div class="OrderUnit">
                            <div class="unitTop">
                                <div class="topLeft">
                                    <img src="{{ asset('image/completed.svg') }}" alt="">
                                </div>
                                <div class="topMid">
                                    <p class="status">Order Id : {{ $list->orderId }} </p>
                                    <p class="status">Order is Arrived</p>
                                    <p class="purchaseDate">Purchased at {{ $list->orderDate }}</p>
                                    <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}</p>
                                </div>
                                <div class="topRight">
                                    <p class="totalPrice">{{ $list->price }}</p>
                                </div>
                            </div>
                            <div class="unitBottom">
                                <a href="{{ route('admin.orderDetail', $list->orderId) }}" class="button1">View Order
                                    Details</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div id="requestRefund" class="Order tabcontent">
                @foreach ($orders as $list)
                    @if ($list->orderStatus == 'Refund')
                        <div class="OrderUnit">
                            <div class="unitTop">
                                <div class="topLeft">
                                    <img src="{{ asset('image/packed.svg') }}" alt="">
                                </div>
                                <div class="topMid">
                                    <p class="status">Refund has already Requested</p>
                                    <p class="purchaseDate">Purchased at {{ $list->orderDate }}</p>
                                </div>
                                <div class="topRight">
                                    <p class="totalPrice">{{ $list->price }}</p>
                                </div>
                            </div>
                            <div class="unitBottom">
                                <a href="{{ route('admin.orderDetail', $list->orderId) }}" class="button1">View Order
                                    Details</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/admin/order/detail.js') }}"></script>
@endsection
