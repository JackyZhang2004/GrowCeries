@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/adminCRUD.css') }}">
@endpush

@section('title', 'Products')

@section('content')

<div class="container">
    <div class="searchContainer">
        <p class="searchTitle">Find Our Product Here ...</p>
        <input type="text" value="Input product code here..." class="searchField">
    </div>
    <div class="productListContainer">
        <div class="productUnit">
            <div class="unitTop">
                <div class="topLeft">
                    <img src="" alt="">
                </div>
                <div class="topMid">
                    <p class="productName">Semangka</p>
                    <p class="productStock">3000</p>
                </div>
                <div class="topRight">
                    <button onclick="" class="viewDetialsButton">Details</button>
                </div>
            </div>
            <div class="unitBottom">
                <div class="bottomUp">
                    <p class="descriptionTitle">Description :</p>
                    <p class="descripton">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate tenetur error, facilis incidunt omnis, molestiae, quidem commodi dignissimos unde itaque laboriosam maxime explicabo ad molestias! Eveniet facilis asperiores hic doloremque.</p>
                    <P class="productInformationTitle">Product Information</P>
                    
                </div>
                <div class="bottomDown">
                    
                </div>
            </div>

        </div>
    </div>
</div>