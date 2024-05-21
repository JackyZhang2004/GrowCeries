<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\cart;
use App\Models\cartList;
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

        return view('cart', compact('count', 'cartItems'));
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
                CartList::updateOrInsert(
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

    public function checkout(Request $request)
    {
        $user = Auth::user();

        $selectedItems = $request->input('selectedItems');
        $addressId = $request->input('addressId');

        if (is_null($selectedItems) || count($selectedItems) === 0) {
            return redirect()->back()->with('error', 'Please select at least one item to proceed to checkout.');
        }

        $addresses = $user->addresses;
        $firstAddress = address::find($addressId) ?? $addresses->first();

        $cartItems = CartList::whereIn('productId', $selectedItems)->get();
        
        return view('checkout', compact('cartItems', 'addresses', 'firstAddress'));
    }
    
}
