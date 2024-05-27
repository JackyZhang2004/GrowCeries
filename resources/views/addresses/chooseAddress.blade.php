@extends('layouts.app')

@push('head')
    
@endpush

@section('content')
<div class="container">
    <h1>My Addresses</h1>

    @foreach ($addresses as $address)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $address->receiverName }} <br>
                    {{ $address->phoneNumber }} <br>
                    {{ $address->addressName }}, {{ $address->addressDetail }}
                </p>
                <form method="GET" action="{{ route('checkout') }}">
                    @foreach (request()->input('selectedItems', []) as $item)
                        <input type="hidden" name="selectedItems[]" value="{{ $item }}">
                    @endforeach
                    <input type="hidden" name="selectedDeliveryTime" value="{{ request()->input('selectedDeliveryTime') }}">
                    <input type="hidden" name="addressId" value="{{ $address->addressId }}">
                    <button type="submit" class="btn btn-primary">Use this address</button>
                </form>
            </div>
        </div>
    @endforeach

    {{-- <a href="{{ route('address.create') }}" class="btn btn-primary">Add New Address</a> --}}
</div>
@endsection
