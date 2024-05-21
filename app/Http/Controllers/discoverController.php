<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use App\Models\productDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class discoverController extends Controller
{
    public function index()
    {
        $products = product::all();
        $productDetail = productDetail::all();
        $productsQuery = Product::query();

        $user = Auth::user();
        $userId = auth()?->user()?->id;

        $count = 0;

        $cartItems = collect();

        if (Auth::check()) {
            $userId = $user->id;

            // Ensure the user has a cart
            $cart = cart::firstOrCreate(['userId' => $userId]);

            // Get the cart items
            $cartItems = $cart->cartList;

            // Count the cart items
            $count = $cartItems->count();
        }


        if ($searchInput = request()->input('search_Input')) {
            $productsQuery->whereHas('productDetail', function ($query) use ($searchInput) {
                $query->where('productName', 'like', '%' . $searchInput . '%');
            });
        }

        // Execute the quer y to get the results
        $products = $productsQuery->get();

        return view('discover', compact('products', 'count', 'cartItems', 'productDetail'));
    }

}

