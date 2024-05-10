<?php

namespace App\Http\Controllers;

// use App\Models\customer;
use App\Models\product;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $products = product::with('productDetail')->get();;

        return view('home', [
            'products' => $products
        ]);
    }
}
