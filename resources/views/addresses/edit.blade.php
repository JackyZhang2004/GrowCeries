@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Address</h1>
    <form action="{{ route('address.update', $address->addressId) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="receiverName" class="form-label">ReceiverName</label>
            <input type="text" class="form-control" id="receiverName" name="receiverName" value="{{ $address->receiverName }}">
            @error('receiverName')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phoneNumber" class="form-label">phoneNumber</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $address->phoneNumber }}">
            @error('phoneNumber')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="addressName" class="form-label">addressName</label>
            <input type="text" class="form-control" id="addressName" name="addressName" value="{{ $address->addressName }}">
            @error('addressName')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="addressDetail" class="form-label">addresDetail</label>
            <input type="text" class="form-control" id="addressDetail" name="addressDetail" value="{{ $address->addressDetail }}">
            @error('addressDetail')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
