@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/myAddress.css') }}">
@endpush

@section('title', 'My Address')

@section('content')
    <h1 class="title">My Address</h1>
    <div class="container">
        @if ($addresses->count() == 0)
            <div class="alert">
                <img class="noAddress" src="{{asset('image/noAddress.svg')}}" alt="">
                <p class="noAddressExp">You don't have any address in this application</p>
                <a href="{{route('address.create')}}" class="addZeroAddress">Add New Address</a>
            </div>
        @else
            <a href="{{route('address.create')}}" class="addAddressButton">Add New Address</a>
            @foreach ($addresses as $address)
                <form action="">
                    <div class="addressUnit">
                        <input type="radio" id={{$address->addressId}}>
                        <div class="left">
                            @if ($address->status == "primary")
                                <img class="addressImage" src="{{asset('image/primary.svg')}}" alt="">
                            @elseif($address->status == "alternative")
                                <img class="addressImage" src="{{asset('image/notPrimary.svg')}}" alt="">    
                            @endif
                        </div>
                        <div class="mid">
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
                </form>
            @endforeach
            <button type="submit">Set Primary Address</button>
        @endif
    </div>

@endsection