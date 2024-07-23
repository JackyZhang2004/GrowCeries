@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/product/adminCRUD.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
@endpush

@section('title', 'Admin | Users Page')

@section('content')
    <div class="successMessage">
      @include('widgets.successMessage')
    </div>
    <div class="errorMessage">
        @include('widgets.errorMessage')
    </div>
    <div class="container">
        <div class="searchContainer">
            <p class="searchTitle">Find Our Product Here ...</p>
            {{-- <form action="{{route('admin.searchProduct')}}" method="GET"> --}}
                <input type="text" placeholder="Input product code here..." class="searchField" id ="searchField" oninput=searchFunction($product)>
            {{-- </form> --}}
        </div>
        <div class="productListContainer">
            <p class="productListTitle">Order List</p>
            @foreach ($users as $user)
                <div class="productUnit">
                    <div class="unitTop">
                        <div class="topLeft">
                            <img src={{asset($user->image )}} alt="">
                        </div>
                        <div class="topMid">
                            <p class="productName">{{$user->name}}</p>
                            <p class="productStock">Id : {{$user->id}}</p>
                        </div>
                        <div class="topRight">
                            <a style="width: 100%; 
                            height:7vh; 
                            color: white; 
                            background-color:red; 
                            border:1px solid; 
                            border-radius: 10px; 
                            display:flex; 
                            justify-content:center; 
                            align-items:center" href="{{route('admin.banUsers', $user->id)}}">Ban</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection