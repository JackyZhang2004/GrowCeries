<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class contactUsController extends Controller
{

    public function contactUs(){
        return view('contactUs');
    }

    public function submitForm(Request $request)
    {
        dd($request);
        // Kirim data ke FormSubmit.co
        // $response = Http::asForm()->post('https://formsubmit.co/jackyzhng2004@gmail.com', [
        //     'email' => request()->input('email'),
        //     'message' => request()->input('message'),
        // ]);

        


        // Set notifikasi sukses ke session
        return redirect()->route('contactUs')->with('success', 'Form has been submitted successfully!');
    }
}
