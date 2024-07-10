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
    public function index($category = "Current")
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You are not logged in.');
        }

        $orders = Order::where('userId', Auth::id())->get();
        
        return view('order', compact('orders', 'category'));
    }
   
    public function detail($id){
        $order = Order::where('orderId', $id)->first();
        $orderDetail = orderList::where('orderId', $id)->get();
        $totalPrice = 0;
        
        foreach ($orderDetail as $item) {
            $priceperUnit = $item->product->productPrice * $item->quantity;
            $totalPrice += $priceperUnit;
        }
        return view('orderDetail', compact('order', 'orderDetail', 'totalPrice'));
    }

    public function delete($id){
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('order');
    }

    public function refund($id){

    }
}
