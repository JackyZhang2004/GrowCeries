<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\productDetail;
use Illuminate\Http\Request;

class discoverController extends Controller
{
    public function index()
    {
        $products = product::all();
        $productDetail = productDetail::all();
        $productsQuery = Product::query();

        if ($searchInput = request()->input('search_Input')) {
            $productsQuery->whereHas('productDetail', function ($query) use ($searchInput) {
                $query->where('productName', 'like', '%' . $searchInput . '%');
            });
        }

        // Execute the quer y to get the results
        $products = $productsQuery->get();

        return view('discover', [
    }
}

