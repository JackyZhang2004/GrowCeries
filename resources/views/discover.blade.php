@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="{{ asset('css/discover.css') }}">

@endpush

@section('title', 'Discover')

@section('content')

<h1>Our Product</h1>
<div class="main">
    
</div>


@endsection

{{--
<div class="filters">
    <div class="container">
        <div class="sidebar">
            <input type="text" id="txtSearch" placeholder="Search Product..."/>
            <h3>Category</h3>
            <ul>
                <!-- category list shows from javascript code -->
            </ul>
            <h3>Price Range</h3>
            <div class="price">
                <input type="range" id="priceRange"/>
                <span class="priceValue">500</span>
            </div>
        </div>



        <div class="content">
            <div class="products">
                <!--products list dshows from javascript code-->
            </div>
        </div>
    </div>
</div> --}}
