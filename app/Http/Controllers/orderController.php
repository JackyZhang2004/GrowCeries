<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartList;
use App\Models\order;
use App\Models\orderList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You are not logged in.');
        }

        $orders = Order::where('userId', Auth::id())->get();
        
        return view('order', compact('orders'));
    }
   
}
