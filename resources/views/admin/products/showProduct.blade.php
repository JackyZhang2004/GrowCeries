@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/productDetail.css') }}">
@endpush

@section('title', 'Product Detail')

@section('content')
    @if ($editing ?? false)
    <p>ini edit view</p>
    <div class="addContainer">
        <form action="{{ route('admin.updateProduct', $product->productId) }}" method="POST">
            @csrf
            @method('put')
            <label for="productName">Product Name</label><br>
            <input name="productName" type="text" id="productName">
            @error('productName')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="productPrice">Product Price</label><br>
            <input name="productPrice" type="tel" id="productPrice" value="{{old('productPrice')}}">
            @error('productPrice')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="stock">stock</label><br>
            <input name="stock" type="tel" id="stock" value="{{old('stock')}}">
            @error('stock')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="variant">variant</label><br>
            <input name="variant" type="text" id="variant" value="{{old('variant')}}">
            @error('variant')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="calories">calories</label><br>
            <input name="calories" type="tel" id="calories" value="{{old('calories')}}">
            @error('calories')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>
            
            <label for="fat">Fat</label><br>
            <input name="fat" type="tel" id="fat" value="{{old('fat')}}">
            @error('fat')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="sugar">sugar</label><br>
            <input name="sugar" type="tel" id="sugar" value="{{old('sugar')}}">
            @error('sugar')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="carbohydrate">carbohydrate</label><br>
            <input name="carbohydrate" type="tel" id="carbohydrate" value="{{old('carbohydrate')}}">
            @error('carbohydrate')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="protein">protein</label><br>
            <input name="protein" type="tel" id="protein" value="{{old('protein')}}">
            @error('protein')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>
            
            <label for="shelfLife">shelf Life</label><br>
            <textarea name="shelfLife" id="shelfLife"> {{old('shelfLife')}}</textarea>
            @error('shelfLife')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>
            
            <p>category</p>
            <input type="radio" id="productCategory" name="productCategory" value="buah" {{ old('productCategory') == "buah" ? 'checked' : '' }}>
            <label for="Buah">Buah</label><br>
            <input type="radio" id="productCategory" name="productCategory" value="sayur" {{ old('productCategory') == "sayur" ? 'checked' : '' }}>
            <label for="sayur">sayur</label>
            @error('productCategory')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>
            
                        
            <label for="productDesc">product Desc</label><br>
            <textarea name="productDesc"id="productDesc">{{old('productDesc')}}</textarea>
            @error('productDesc')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    @else    
        <p>ini view show</p>
        <p>{{$product}}</p>
        <p>{{$product->productDetail}}</p>
    @endif
@endsection