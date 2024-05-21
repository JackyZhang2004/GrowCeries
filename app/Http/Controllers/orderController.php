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
    public function makeOrder(Request $request)
    {
        $user = Auth::user();
    
        $selectedItems = explode(',', $request->input('selectedItems', ''));
        $addressId = $request->input('addressId');
    
        $courierId = 6;
        // ini masih ditembak auto 6 kurirnya
    
        if (empty($selectedItems)) {
            
            return redirect()->back()->withErrors('Please select at least one item to place an order.');
        }
    
        try {
            // Create a new order
            $order = $this->createOrder($user->id, $courierId);
    
            // Add items to the order
            $this->addOrderItems($order->orderId, $selectedItems, $user->id);
    
            // Redirect to a success page or order summary
            return redirect()->route('home')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to place order. Please try again.');
        }
    }

    private function createOrder($userId, $courierId)
    {
        $order = new order();
        $order->userId = $userId;
        $order->courierId = $courierId;
        $order->orderDate = Carbon::now();
        $order->orderStatus = 'Pending';
        $order->save();

        return $order;
    }

    private function addOrderItems($orderId, $selectedItems, $userId)
    {
        $user = Auth::user();
        foreach ($selectedItems as $itemId) {
            $cartItem = cartList::where('productId', $itemId)->where('cartId', $user->cart->cartId)->first();

            if ($cartItem) {
                $orderDetail = new orderList();
                $orderDetail->orderId = $orderId;
                $orderDetail->productId = $cartItem->productId;
                $orderDetail->quantity = $cartItem->quantity;
                $orderDetail->save();

                $cartItem->where('cartId', $cartItem->cartId)->where('productId', $cartItem->productId)->delete();
                
            }
        }
    }
}
