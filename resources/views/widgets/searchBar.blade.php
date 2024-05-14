@push('head')
<link rel="stylesheet" href="{{ asset('css/widgets/searchBar.css') }}">
{{-- <script src="js/discover.js"></script> --}}
@endpush

{{-- <div class="col-md-8 searchForm">
    <div class="search">
        <i class="fa fa-search"></i>
        <input type="text" class="form-control" id="input_box" placeholder="Have a question? Ask Now">
        <button class="btn btn-primary">Search</button>
        @foreach ($products as $product)
            <p>{{ $product->productDetail->productName }}</p>
        @endforeach
    </div>
</div> --}}

<form action="" id="search" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">
    <div class="p-1 border rounded rounded-pill shadow-sm mb-4 ml-1" id="searchbar">
        <div class="input-group">
            <div class="input-group-prepend">
                <button id="button-addon2" type="submit" class="btn btn-link text-warning">
                    <i class="bi bi-search" id="magnifying" style="color: #050505"></i>
                </button>
            </div>
            <div class="dropdown m-0">
                <input type="search" placeholder="Search people" id="myInput" oninput="filterFunction()"
                    class="form-control border-0 rounded-pill" aria-describedby="button-addon2" autocomplete="off">
                <div id="myDropdown" class="dropdown-content" style="background-color: white;border-top:0px">
                    @foreach ($products as $product)
                    <div class="percontent">
                        <a href="">
                            <div class="media flex-wrap w-100 align-items-center">
                                {{-- <img src="{{ $user->getImageURL() }}" class="d-block ui-w-40 rounded-circle" alt=""> --}}
                                <p class="ml-2" style="color: #050505">{{ $product->productDetail->productName }}</p>
                                {{-- <p>{{ $ }}</p> --}}
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</form>

