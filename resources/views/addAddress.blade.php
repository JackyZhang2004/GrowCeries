@extends('layouts.app')


@push('head')
    <link rel="stylesheet" href="{{ asset('css/addAddress.css') }}">

@endpush

@section('title', 'Add Address')

@section('content')




@endsection

@section('script')
    <script src="{{ asset('js/addAddress.js') }}"></script>
@endsection
