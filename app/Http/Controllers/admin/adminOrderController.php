<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class adminOrderController extends Controller
{
    public function index(){
        $orders = order::orderBy('orderId', 'asc');
        return view('admin.order.orderAdmin', compact('orders'));
    }
}
