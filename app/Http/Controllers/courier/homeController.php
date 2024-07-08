<?php

namespace App\Http\Controllers\courier;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $orders = order::all(); 
        return view('courier.home',compact('orders'));
    }
}
