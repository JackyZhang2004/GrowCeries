@extends('layouts.appCourier')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/courier/home.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/discover.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> ini buat nyambungin home.css ke home blade nya --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

@endpush

@section('title', 'Courier Home')

@section('content')
    <div class="successMessage">
      @include('widgets.successMessage')
    </div>
    <div class="errorMessage">
        @include('widgets.errorMessage')
    </div>
    <div class="content">
        <img src="{{ asset('image/GrowceriesLogo.svg') }}" class="logoGrow" alt="" srcset="">
        <div class="header">
            <div class="title">Order List</div>
            <form action="{{route('courier.home')}}" method="GET" id="search" data-aos="fade-right" data-aos-delay="200"
        data-aos-duration="1000">

        <div class="input-group">
          <div class="search_container">
            <i class="bi bi-search" id="magnifying" style="color: #050505 solid"></i>
            <input name="search_Input" type="text" autocomplete="off" placeholder="Search your daily Growceries"
              id="myInput" oninput="filterFunction()" class="form-control">
            <button class="search_button">Search</button>
          </div>
        </div>
        <div class="result_box">
          <div id="dropdown_m0" class="dropdown m-0">
            <div id="myDropdown" class="dropdown-content">
              <div class="result_field">
                {{-- @foreach ($products as $product)
                <div name="search_Input" class="percontent">
                  <a href="">
                    <div id="result_field" class="media flex-wrap w-100 align-items-centerr">
                      <i class="bi bi-search" id="magnifying2" style="color: #050505 solid"></i>
                      <p class="ml-23" style="color: #050505">{{ $product->productDetail->productName }}</p>
                    </div>
                  </a>
                </div>
                @endforeach --}}
              </div>

            </div>
          </div>
        </div>

      </form>
        </div>

        <div class="option">
            <div class="option_sub">
                <p class="option_title">Pick Up Order</p>
            </div>
            <div class="option_sub">
                <p class="option_title">Shipped Order</p>
            </div>
        </div>
        {{-- @php
            dump($uporder->orderId)
        @endphp --}}
        <div class="listfield">

                @foreach ($orders1 as $order)
                <form action="{{ route('courier.update', $order->orderId) }}" method="GET" id="search2" data-aos="fade-right"
                    data-aos-delay="200" data-aos-duration="1000">
                        <div class="box">
                            <div class="top">
                                <img class="icon_status" src="{{ asset('image/packed.svg')}}" alt="" srcset="">
                                <div class="detail">
                                    <p class="status_title">Order is being {{$order->orderStatus}}</p>
                                    {{-- <p class="status_title">Order is being packed</p> --}}
                                    <p class="date">Purchased at {{$order->orderDate}}</p>
                                    <p class="id_order">000{{$order->orderId}}</p>
                                </div>
                                <div class="price">Rp. {{ number_format($order->totalPrice, 0, ',', '.') }}</div>
                            </div>
                            <div class="line">
                            </div>
                            <div class="bottom">
                                <button id="update_status_button" class="update_status" type="submit">Order Pick Up</button>
                            </div>
                        </div>
                    </form>
                @endforeach
        </div>
        <div class="listfield">

                @foreach ($orders2 as $order)
                <form action="{{ route('courier.update', $order->orderId) }}" method="GET" id="search2" data-aos="fade-right"
                    data-aos-delay="200" data-aos-duration="1000">
                        <div class="box">
                            <div class="top">
                                <img class="icon_status" src="{{ asset('image/packed.svg')}}" alt="" srcset="">
                                <div class="detail">
                                    <p class="status_title">Order is being {{$order->orderStatus}}</p>
                                    {{-- <p class="status_title">Order is being packed</p> --}}
                                    <p class="date">Purchased at {{$order->orderDate}}</p>
                                    <p class="id_order">000{{$order->orderId}}</p>
                                </div>
                                <div class="price">Rp. 72.000</div>
                            </div>
                            <div class="line">
                            </div>
                            <div class="bottom">
                                <button id="update_status_button" class="update_status" type="submit">Order Pick Up</button>
                            </div>
                        </div>
                    </form>
                @endforeach
        </div>
    </div>


    {{-- <p class="h1">Welcome Courier</p>
    <p>Home page</p> --}}


@endsection
