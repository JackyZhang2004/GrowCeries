<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function productDetails($id){
        $product = product::where('productId', $id)->first();
        return view('productDetail', ['product'=>$product]);
    }
}
