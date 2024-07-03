<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = order::orderBy('orderId', 'asc')->get();
        return view('admin.order.index', compact('orders'));
    }
}
