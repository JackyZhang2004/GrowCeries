<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function editPersonalData(Request $request)
    {
        $user = Auth::user();
        $editingPersonalData = true;
        return view('profile', compact('user', 'editingPersonalData'));
    }
    public function updatePicture(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $request->validate([
            'image' => 'required'
        ]);

        $user = user::where('id', $userId)->first();

        if($request->file('image')){
            $validated['image'] = $request->file('image')->store('refund');
        }

        User::updateOrInsert(
            ['id' => $userId],
            ['image' => $validated['image']]
        );
        
        return redirect()->route('profile')->with('success', 'Succesfully change your profile picture');
    }
    public function updatePersonalData(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $nameReq = $request->input("name");
        $genderReq = $request->input("gender");
        $phoneReq = $request->input("phone");
        $emailReq = $request->input("email");

        User::updateOrInsert(
            ['id' => $userId],
            ['image' => $nameReq]
        );
        User::updateOrInsert(
            ['id' => $userId],
            ['image' => $genderReq]
        );
        User::updateOrInsert(
            ['id' => $userId],
            ['image' => $phoneReq]
        );
        User::updateOrInsert(
            ['id' => $userId],
            ['image' => $emailReq]
        );
        return redirect()->route('profile')->with('success', 'Succesfully change your personal data');
    }
}
