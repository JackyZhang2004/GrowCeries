@push('head')
<link rel="stylesheet" href="{{ asset('css/widgets/searchBar.css') }}">
@endpush

<div class="col-md-8 searchForm">
    <div class="search">
        <i class="fa fa-search"></i>
        <input type="text" class="form-control" placeholder="Have a question? Ask Now">
        <button class="btn btn-primary">Search</button>
    </div>
</div>