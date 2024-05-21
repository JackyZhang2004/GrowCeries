@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

@section('title', 'Home')

@section('content')

<div class="jumbotron">
  <img src="image/brokolisvg.png" alt="" class="imagejumbotron imagebrokoli">
  <img src="image/apel.png" alt="" class="imagejumbotron imageapel">
  <img src="{{ asset('image/GrowceriesLogo.svg') }}" alt="" class="imagejumbotron imagelogo">
  <img src="image/wortel.png" alt="" class="imagejumbotron imagewortel">
  <img src="image/bluberi.png" alt="" class="imagejumbotron imagebluberi">
  <img src="image/paprika.png" alt="" class="imagejumbotron imagepaprika">
  <img src="image/kubis.png" alt="" class="imagejumbotron imagekubis">
  <img src="image/selada.png" alt="" class="imagejumbotron imageselada">
  <img src="image/pisang.png" alt="" class="imagejumbotron imagepisang">
  <img src="image/stroberi.png" alt="" class="imagejumbotron imagestroberi">
  <img src="image/semangka.png" alt="" class="imagejumbotron imagesemangka">
  <img src="image/daunbawang.png" alt="" class="imagejumbotron imagedaunbawang">

  <button id="clicktocontinue" onclick=scrollbottom()>
    <p>Click here to continue</p>
    <img src="image/Arrow.png" alt="" class="imagejumbotron arrow1">
    <img src="image/Arrow.png" alt="" class="imagejumbotron arrow2">
  </button>
</div>
    <div class="backgroundSearch" id="searchJumbotron">
      <div class="kiri">
        <div class="centered_box">
            <p class="mainText">Order Your
                <br>Daily Growceries</p>
            <form action="{{route('discover')}}" method="GET" id="search" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">

                <div class="input-group">
                    <div class="search_container">
                        <i class="bi bi-search" id="magnifying" style="color: #050505 solid"></i>
                        <input name="search_Input" type="text" autocomplete="off" placeholder="Search your daily Growceries" id="myInput" oninput="filterFunction()"
                        class="form-control">
                        <button class="search_button">Search</button>
                    </div>
                </div>
                <div class="result_box">
                    <div id="dropdown_m0" class="dropdown m-0">
                        <div id="myDropdown" class="dropdown-content">
                            <div class="result_field">
                                @foreach ($products as $product)
                                <div name="search_Input" class="percontent">
                                    <a href="">
                                        <div id="result_field" class="media flex-wrap w-100 align-items-centerr">
                                            <i class="bi bi-search" id="magnifying2" style="color: #050505 solid"></i>
                                            <p class="ml-23" style="color: #050505">{{ $product->productDetail->productName }}</p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

        </form>
        </div>

      </div>
      <div class="kanan">
        <img src="image/backgroundCarousel.png" width="100%" height="auto" alt="" srcset="">
      </div>
    </div>

    <div class="recommendedSection">
      <p class="recommendationTitle" style="text-align: center"> <strong>Recommendation</strong></p>
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
      <script src="{{ asset('js/home.js') }}"></script>
@endsection
