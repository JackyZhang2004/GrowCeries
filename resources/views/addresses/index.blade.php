{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Addresses</h1>
    <a href="{{ route('addresses.create') }}" class="btn btn-primary">Add New Address</a>
    <ul>
        @foreach ($addresses as $address)
            <li>
                
                <a href="{{ route('addresses.edit', $address) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('addresses.destroy', $address) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection --}}
