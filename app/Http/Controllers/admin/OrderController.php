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
        $searchResult = null;
        return view('admin.order.index', compact('orders', 'searchResult'));
    }

    public function detail($orderId){
        $order = order::where('orderId', $orderId)->first();
        $detail = orderList::where('orderId', $orderId)->get();
        return view('admin.order.detail', compact('detail', 'order'));
    }

    public function search(Request $request){

        if ($request->has('search')) {
            $orders = order::where('orderId', 'LIKE', $request->search)->get();
        }
        else{
            $orders = order::all();
        }
        $searchResult = $orders->first() ?: null; // Assuming only one result for simplicity

        // dump($searchResult);
        // dd($searchResult && $searchResult->orderStatus == 'Done');

        return view('admin.order.index', compact('orders', 'searchResult'));
    }
}
