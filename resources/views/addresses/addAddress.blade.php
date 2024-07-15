    @extends('layouts.app')


    @push('head')
        <link rel="stylesheet" href="{{ asset('css/addAddress.css') }}">
    @endpush

    @section('title', 'Add Address')

    @section('content')
        <form action="{{ route('address.create') }}" method="POST">
            @csrf
            <div class="contact">
                <h1 class="h1 mt-3">Add Address</h1>
                <h2>Contact</h2>
                {{-- <input type="name" class="name" placeholder="Full Name"> --}}

                <label for="receiverName" class="form-label">Receiver Name</label>
                <input type="name" class="name" id="receiverName" name="receiverName" placeholder="Full Name" value="{{ old('receiverName') }}">
                @error('receiverName')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
                {{-- <input type="number" class="number" placeholder="Phone Number"> --}}

                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="number" class="number" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="Phone Number">
                @error('phoneNumber')
                <span class="error text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="address">
                <h2>Address</h2>
                <label for="addressName" class="form-label">Address Name</label>
                <input type="text" class="name" id="addressName" name="addressName" value="{{ old('addressName') }}" placeholder="Province, City, District, Postal Code">
                @error('addressName')
                <span class="error text-danger">{{ $message }}</span>
                @enderror

                <label for="addressDetail" class="form-label">Address Detail</label>
                <input type="text" class="name" id="addressDetail" name="addressDetail" value="{{ old('addressDetail') }}" placeholder="Other Details (Example: Block/Unit No., Benchmark)">
                @error('addressDetail')
                <span class="error text-danger">{{ $message }}</span>
                @enderror

                {{-- <input type="province" class="province" placeholder="Province, City, District, Postal Code"> --}}
                {{-- <input type="street" class="street" placeholder="Street Name, Building, House Number"> --}}
                {{-- <input type="other" class="other" placeholder="Other Details (Example: Block/Unit No., Benchmark)"> --}}

            </div>
            <div class="button">
                <button id = "save-btn" onclick="" type="submit"> Save</button>
            </div>
        </form>


    @endsection

    @section('script')
        <script src="{{ asset('js/addAddress.js') }}"></script>
    @endsection
