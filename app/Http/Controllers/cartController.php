<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\cart;
use App\Models\cartList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class cartController extends Controller
{
    public function index()
    {
        $count = 0;
        $cartItems = collect();


        if (Auth::check()) {
            $user = Auth::user();
            $userId = $user->id;

            // Ensure the user has a cart
            $cart = Cart::firstOrCreate(['userId' => $userId]);

            // Get the cart items
            $cartItems = $cart->cartList;

            // Count the cart items
            $count = $cartItems->count();
        }

        $now = Carbon::now();

        // Define delivery time slots
        $timeSlots = [
            ['start' => 6, 'end' => 9, 'label' => '06:00-09:00'],
            ['start' => 12, 'end' => 15, 'label' => '12:00-15:00'],
            ['start' => 18, 'end' => 21, 'label' => '18:00-21:00'],
        ];

        // Create an array to store the delivery times
        $deliveryTimes = [];

        // Check today's delivery times
        foreach ($timeSlots as $slot) {
            if ($now->hour < $slot['end'] && $now->hour >= $slot['start']) {
                $deliveryTimes[] = [
                    'date' => $now->format('d M'),
                    'day' => 'Today',
                    'time' => $slot['label']
                ];
            }
        }

        // Add tomorrow's and day after tomorrow's delivery times
        for ($i = 1; $i <= 2; $i++) {
            $date = $now->copy()->addDays($i);
            foreach ($timeSlots as $slot) {
                $deliveryTimes[] = [
                    'date' => $date->format('d M'),
                    'day' => $i == 1 ? 'Tomorrow' : ($i == 2 ? '2 more Days' : ''),
                    'time' => $slot['label']
                ];
            }
        }

        return view('cart', compact('count', 'cartItems', 'deliveryTimes'));
    }

    public function addCart($id)
    {
        $productId = $id;
        $user = Auth::user();

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You are not logged in.');
        }

        $userId = $user->id;

        // Ensure the user has a cart
        $cart = cart::firstOrCreate(['userId' => $userId]);

        // Check if the product already exists in the user's cart
        $cartItem = cartList::where('cartId', $cart->cartId)->where('productId', $productId)->first();

        if ($cartItem) {
            // If the product exists, increment the quantity
            $cartItem->quantity += 1;
        } else {
            // If the product does not exist, create a new cart entry
            $cartItem = new cartList([
                'cartId' => $cart->cartId,
                'productId' => $productId,
                'quantity' => 1
            ]);
        }

        $cartItem->save();

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function incrementCart($id)
    {
        $user = Auth::user();

        if (is_null($user)) {
            return redirect()->route('login')->with('error', 'You are not logged in.');
        }

        $userId = $user->id;
        $cart = cart::firstOrCreate(['userId' => $userId]);
        $cartItem = cartList::where('cartId', $cart->cartId)->where('productId', $id)->first();

        if ($cartItem) {
            // Ensure the retrieved CartList item belongs to the user's cart
            if ($cartItem->cartId === $cart->cartId) {
                $cartItem->quantity += 1;

                // Use upsert to insert or update the cart item
                cartList::upsert(
                    [
                        'cartId' => $cart->cartId,
                        'productId' => $id,
                        'quantity' => $cartItem->quantity
                    ],
                    ['cartId', 'productId'],
                    ['quantity']
                );

                return redirect()->back()->with('success', 'Product quantity increased');
            } else {
                return redirect()->route('login')->with('error', 'You are not logged in.');
            }
        } else {
            return redirect()->back()->with('error', 'Product not found in cart');
        }
    }

    public function decrementCart($id)
    {
        $user = Auth::user();

        if (is_null($user)) {
            return redirect()->route('login')->with('error', 'You are not logged in.');
        }
    
        $userId = $user->id;
        $cart = Cart::firstOrCreate(['userId' => $userId]);
        $cartItem = CartList::where('cartId', $cart->cartId)->where('productId', $id)->first();
    
        if ($cartItem) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
    
                // Use the custom method to handle composite keys
                cartList::updateOrInsert(
                    ['cartId' => $cart->cartId, 'productId' => $id],
                    ['quantity' => $cartItem->quantity]
                );
    
                return redirect()->back()->with('success', 'Product quantity decreased');
            } else {
                cartList::where('cartId', $cart->cartId)->where('productId', $id)->delete();
                return redirect()->back()->with('success', 'Product removed from cart');
            }
        } else {
            return redirect()->back()->with('error', 'Product not found in cart');

        }
    }

    public function destroy($id){
        $user = Auth::user();

        $userId = $user->id;

        $cart = Cart::firstOrCreate(['userId' => $userId]);

        cartList::where('cartId', $cart->cartId)->where('productId', $id)->delete();

        return redirect()->route('cart')->with('success', 'cart item deleted successfully!');
     }
    
    public function checkout(Request $request)
    {
        $user = Auth::user();

        $addressId = $request->input('addressId');

        $addresses = $user->addresses;
        $firstAddress = address::find($addressId) ?? $addresses->first();

        $selectedItems = $request->input('selectedItems');

        $cartId = $user->cart->cartId; 

        $cartItems = cartList::whereIn('productId', $selectedItems)->where('cartId', $cartId)->get(); 

        $selectedDeliveryTime = $request->input('selectedDeliveryTime');
        if(str_contains($selectedDeliveryTime, 'Today') | str_contains($selectedDeliveryTime, 'Tomorrow') | str_contains($selectedDeliveryTime, '2 more Days')){
            $dateTimeParts = explode(' ', $selectedDeliveryTime);
            $selectedDate = $dateTimeParts[0] . ' ' . $dateTimeParts[1];
            $selectedTime = $dateTimeParts[5]; 
            $selectedDeliveryTime = $selectedDate . ' ' . $selectedTime;
        }

        return view('checkout', compact('cartItems', 'addresses', 'firstAddress','selectedDeliveryTime'));
    }
}
