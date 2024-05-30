@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/product/adminCRUD.css') }}">
@endpush

@section('title', 'Products')

@section('content')

<div class="container">
    <div class="searchContainer">
        <p class="searchTitle">Find Our Product Here ...</p>
        <input type="text" placeholder="Input product code here..." class="searchField">
    </div>
    <div class="productListContainer">
        <p class="productListTitle">Product List</p>
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
@endsection

{{-- @extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/products/index.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
{{-- @endpush

@section('title', 'Admin | Products Page')

@section('content')
    <div class="successMessage">
      @include('widgets.successMessage')
    </div>
    <div class="errorMessage">
        @include('widgets.errorMessage')
    </div>
    <p class="h1">Welcome Admin</p>
    <p>Users Page</p>
    <a href="{{ route('admin.users') }}">redirect to Users page</a> <br>
    <a href="{{ route('admin.products') }}">redirect to Product page</a>
    <br>
    <a href="{{ route('admin.addProductIndex') }}">Create new Product</a>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Variant</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->productId }}</td>
                    <td>{{ $product->productDetail->productName }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->variant}}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.destroyProduct', $product->productId) }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.editProduct', $product->productId) }}">Edit</a>
                            <a href="{{ route('admin.showProduct', $product->productId) }}">Show</a>
                            <button class="btn btn-danger btn-sm"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection --}}