@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/myAddress.css') }}">
@endpush

@section('title', 'My Address')

@section('content')
    <h1 class="title">My Address</h1>
    <a href="{{route('address.create')}}" class="addAddressButton">Add New Address</a>
    <div class="container">
        @if ($addresses->count() == 0)
            
        @else
            @foreach ($addresses as $address)
                <div class="addressUnit">
                    <div class="left">
                        <div class="unitTop">
                            <p class="identity">{{$address->receiverName}}</p>
                            <p class="horiLine">|</p>
                            <p class="phone">{{$address->phoneNumber}}</p>
                        </div>    
                        <div class="unitBottom">
                            <p class="addressDetail">{{$address->addressName}}, </p>
                            <p class="addressDetail"> {{$address->addressDetail}}</p>
                        </div>
                    </div>
                    <div class="right">
                        <a href="{{route('address.edit', ['id'=>$address->addressId])}}" class="addressDetailButton">Edit Address</a>
                        <a href="{{route('address.destroy', ['address'=>$address])}}" class="addressDeleteButton">Delete</a>
                    </div>
                </div>                
            @endforeach
        @endif
    </div>

@endsection