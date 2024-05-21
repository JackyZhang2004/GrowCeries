@extends('layouts.app')

@push('head')
    
@endpush

@section('title', 'Add Address')

@section('content')
<div class="container">
    <h1>Add Address</h1>
    <form action="{{ route('address.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="receiverName" class="form-label">ReceiverName</label>
            <input type="text" class="form-control" id="receiverName" name="receiverName" value="{{ old('receiverName') }}">
            @error('receiverName')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phoneNumber" class="form-label">phoneNumber</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}">
            @error('phoneNumber')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="addressName" class="form-label">addressName</label>
            <input type="text" class="form-control" id="addressName" name="addressName" value="{{ old('addressName') }}">
            @error('addressName')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="addressDetail" class="form-label">addresDetail</label>
            <input type="text" class="form-control" id="addressDetail" name="addressDetail" value="{{ old('addressDetail') }}">
            @error('addressDetail')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Address</button>
    </form>
</div>
@endsection
