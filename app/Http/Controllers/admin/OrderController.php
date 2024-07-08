<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderList;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = order::orderBy('orderId', 'DESC')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function detail($orderId){
        $order = order::where('orderId', $orderId)->first();
        $detail = orderList::where('orderId', $orderId)->get();
        return view('admin.order.detail', compact('detail', 'order'));
    }
}
