<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class discoverController extends Controller
{
    public function index(){
        $products = product::all();

        return view('discover', [
            'products' => $products
        ]);

        // $category = category::OrderBy()
    }

}
