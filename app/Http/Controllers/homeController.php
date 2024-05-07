<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        // $product = new product();

        return view('home', [
            'products' => product::all()
        ]);
    }
}
