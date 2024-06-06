@push('head')
<link rel="stylesheet" href="{{ asset('css/widgets/productCard.css') }}">
@endpush

<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 d-flex align-items-stretch mt-3">
  <div class="card">
    <a href="{{ route('productDetail', ['id'=>$product->productDetailId]) }}" class="productDetailButton">
      <img src="{{ asset('image/gambarRectangle.png') }}" class="card-img-top" alt="...">
    </a>
    <div class="card-body">
      <a href="{{ route('productDetail', ['id'=>$product->productDetailId]) }}" class="productDetailButton">
        <p class="card-title h5">{{$product->productDetail->productName}}</p>
      </a>
      <a href="{{ route('productDetail', ['id'=>$product->productDetailId]) }}" class="productDetailButton">
        <p class="text-muted card-text varianttext">{{$product->productDetail->variant}}</p>
      </a>
      <a href="{{ route('productDetail', ['id'=>$product->productDetailId]) }}" class="productDetailButton">
        <p class="card-text productPrice">Rp {{$product->productPrice}}</p>
      </a>
      @php
      $cartItem = $cartItems->firstWhere('productId', $product->productId);
      @endphp

      @if (is_null($cartItem) || $cartItem->quantity == 0)
      <!-- ADD Button -->
      <a href="{{ url('add-cart', $product->productId) }}" type="button" class="btn addbutton">ADD</a>
      @else
      <!-- Increment and Decrement Buttons -->
      <div class="quantityControl">
        <form action="{{ route('cart.decrement', $product->productId) }}" method="POST" class="d-inline plesMines">
          @csrf
          <button type="submit" class="btn btn-outline-secondary quantity-btn">-</button>
        </form>
        <span class="quantity mx-2">{{ $cartItem->quantity }}</span>
        <form action="{{ route('cart.increment', $product->productId) }}" method="POST" class="d-inline plesMines">
          @csrf
          <button type="submit" class="btn btn-outline-success quantity-btn">+</button>
        </form>
      </div>
      @endif
      {{-- <a href="{{ url('add-cart', $product->productId) }}" type="button" class="btn addbutton">ADD</a> --}}
    </div>
  </div>
</div>
