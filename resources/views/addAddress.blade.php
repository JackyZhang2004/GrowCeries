@extends('layouts.app')


@push('head')
    <link rel="stylesheet" href="{{ asset('css/addAddress.css') }}">

@endpush

@section('title', 'Add Address')

@section('content')

<div class="contact">
    <h2>Contact</h2>
    <input type="name" class="name" placeholder="Full Name">
    <input type="number" class="number" placeholder="Phone Number">
</div>
<div class="address">
    <h2>Address</h2>
    <input type="province" class="province" placeholder="Province, City, District, Postal Code">
    <input type="street" class="street" placeholder="Street Name, Building, House Number">
    <input type="other" class="other" placeholder="Other Details (Example: Block/Unit No., Benchmark)">
</div>
<div class="button">
    <button id = "save-btn" onclick=""> Save</button>
</div>

@endsection

@section('script')
    <script src="{{ asset('js/addAddress.js') }}"></script>
@endsection
