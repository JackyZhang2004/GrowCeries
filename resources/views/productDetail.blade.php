@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/productDetail.css') }}">
@endpush

@section('title', 'Product Detail')

@section('content')
    <p>tes product detail page</p>
    <p>{{$product}}</p>
    <p>{{$product->productDetail}}</p>
@endsection