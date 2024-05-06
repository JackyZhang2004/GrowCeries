@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

@section('title', 'Home')

@section('content')
    <div class="jumbotron">
        <img src="image/brokolisvg.png" alt="" class="imagejumbotron imagebrokoli">
        <img src="image/apel.png" alt="" class="imagejumbotron imageapel">
        <img src="image/anggur.png" alt="" class="imagejumbotron imageanggur">
        <img src="image/logoGrowceries.png" alt="" class="imagejumbotron imagelogo">
        <img src="image/wortel.png" alt="" class="imagejumbotron imagewortel">
        <img src="image/bluberi.png" alt="" class="imagejumbotron imagebluberi">
        <img src="image/paprika.png" alt="" class="imagejumbotron imagepaprika">
        <img src="image/kubis.png" alt="" class="imagejumbotron imagekubis">
        <img src="image/selada.png" alt="" class="imagejumbotron imageselada">
        <img src="image/pisang.png" alt="" class="imagejumbotron imagepisang">

        <a href="#carouselExampleControls" id="clicktocontinue">
            <p>Click here to continue</p>
            <img src="image/Arrow.png" alt="" class="imagejumbotron arrow1">
            <img src="image/Arrow.png" alt="" class="imagejumbotron arrow2">
        </a>
    </div>
    {{-- untuk navbarnya udah ada dari layouts.app, jadi langsung ngoding bagian home yang jumbotron --}}
    {{-- kalo mau ngoding dimulai dari sini --}}
 
    <section class="bg-center bg-no-repeat bg-[url('image/backgroundCarousel.png')] bg-gray-700">
      <div class="px-4 mx-auto text-center">
          <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">We invest in the world’s potential</h1>
          <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
          <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
              <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                  Get started
                  <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                  </svg>
              </a>
              <a href="#" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                  Learn more
              </a>  
          </div>
      </div>
    </section>

    {{-- Recommended Section --}}
    <div class="recommendedSection">
      <p class="h3 my-3" style="text-align: center"> <strong>Recommendation</strong></p>
      <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4">
        <div class="col-6">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    {{-- Carousel --}}
    {{-- <div id="carouselExampleControls" class="carousel slide container" data-ride="carousel">
        <div class="carousel-inner grid-cols-">
          <div class="carousel-item active">
            <img class="d-block w-100 h-25" src="image/backgroundCarousel.png" alt="First slide">

          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="image/backgroundCarousel.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="image/backgroundCarousel.png" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> --}}
    
    
      <script src="{{ asset('js/home.js') }}"></script>

@endsection