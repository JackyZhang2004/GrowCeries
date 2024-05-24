<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class addressController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses;

        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'receiverName' => 'required|string|max:255',
                'phoneNumber' => 'required|numeric|min_digits:12|max_digits:12',
                'addressName' => 'required|string|max:255',
                'addressDetail' => 'required|string|max:255',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        address::create([
            'userId' => $user->id,
            'receiverName' => $request->receiverName,
            'phoneNumber' => $request->phoneNumber,
            'addressName' => $request->addressName,
            'addressDetail' => $request->addressDetail,
        ]);

        return redirect()->route('address.index')->with('success', 'Address added successfully.');
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('address.index')->with('success', 'Address deleted successfully.');
    }

    public function chooseAddress()
    {
        $user = Auth::user();
        $addresses = $user->addresses;

        return view('addresses.chooseAddress', compact('addresses'));
    }

    public function edit($id)
    {
        $address = address::findOrFail($id);

        if ($address->user_id != Auth::id()) {
            // return redirect()->route('checkout')->withErrors('You are not authorized to edit this address');
        }

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

        if ($address->userId != Auth::id()) {
            return redirect()->route('checkout')->with('error', 'You are not authorized to update this address');
        }
        $address->update($request->all());
        $previousPage = $request->input('previous_page');
        if ($previousPage == route('address.index')) {
            return redirect()->route('address.index')->with('success', 'Address updated successfully');
        } elseif ($previousPage == route('checkout')) {
            return redirect()->route('checkout')->with('success', 'Address updated successfully');
        } else {
            return redirect()->route('home');
        }
    
    }
}