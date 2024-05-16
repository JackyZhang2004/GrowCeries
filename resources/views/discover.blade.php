@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="{{ asset('css/discover.css') }}">

@endpush

@section('title', 'Discover')

@section('content')
<p class="h1 centerText">These are the items you may need...</p>
@include('widgets.searchBar')
<div class="result_box">
    {{-- <ul>
        <li>
                <i class="fa fa-search"></i>
                test
            </li>
            <li>
                <i class="fa fa-search"></i>
                test2
            </li>
        </ul> --}}


    </div>


<div class="recommendedSection">
    <p class="h3 my-3" style="text-align: center"> <strong>Recommendation</strong></p>
    <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 mx-3">
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 d-flex align-items-stretch mt-3">
            <div class="card">
                <a href="{{route('productDetail', ['id'=>$product->productId])}}" class="productDetailButton">
                    <img src="image/gambarRectangle.png" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <a href="{{route('productDetail', ['id'=>$product->productId])}}" class="productDetailButton">
                        <p class="card-title h5">{{$product->productDetail->productName}}</p>
                    </a>
                    <a href="{{route('productDetail', ['id'=>$product->productId])}}" class="productDetailButton">
                        <p class="text-muted card-text varianttext">{{$product->variant}}</p>
                    </a>
                    <a href="{{route('productDetail', ['id'=>$product->productId])}}" class="productDetailButton">
                        <p class="card-text">Rp {{$product->productPrice}}</p>
                    </a>
                    <button type="button" class="btn addbutton">ADD</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    <script src="js/discover.js"></script>
@endsection
