<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addressController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     $addresses = $user->addresses;

    //     return view('addresses.index', compact('addresses'));
    // }

    public function create()
    {
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiverName' => 'required|string|max:255',
            'phoneNumber' => 'required|numeric|min:12|max:12',
            'addressName' => 'required|string|max:255',
            'addressDetail' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->addresses->create($request->all());

        return redirect()->route('addresses.index')->with('success', 'Address added successfully.');
    }

    // public function destroy(Address $address)
    // {
    //     $this->authorize('delete', $address);

    //     $address->delete();

    //     return redirect()->route('addresses.index')->with('success', 'Address deleted successfully.');
    // }

    public function chooseAddress()
    {
        $user = Auth::user();
        $addresses = $user->addresses;

        return view('addresses.chooseAddress', compact('addresses'));
    }

    public function edit($id)
    {
        $address = address::findOrFail($id);

        // if ($address->user_id != Auth::id()) {
        //     // return redirect()->route('checkout')->withErrors('You are not authorized to edit this address');
        // }

        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'receiverName' => 'required|string|max:255',
            'phoneNumber' => 'required|numeric|min_digits:12|max_digits:12',
            'addressName' => 'required|string|max:255',
            'addressDetail' => 'required|string|max:255',
        ]);
        
        $address = Address::findOrFail($id);
        
        // if ($address->user_id != Auth::id()) {
        //     return redirect()->route('checkout')->withErrors('You are not authorized to update this address');
        // }

        $address->update($request->all());
        return redirect()->route('cart')->with('success', 'Address updated successfully');
    }
}
