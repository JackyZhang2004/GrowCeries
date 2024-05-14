@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/products/index.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
@endpush

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
@endsection