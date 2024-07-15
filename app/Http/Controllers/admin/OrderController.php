<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderList;
use Carbon\Carbon;
use Illuminate\Http\Request;
<<<<<<< Updated upstream
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> Stashed changes

class OrderController extends Controller
{
    public function index(){
        $orders = order::orderBy('orderId', 'DESC')->get();
<<<<<<< Updated upstream
        $searchResult = null;
        return view('admin.order.index', compact('orders', 'searchResult'));
=======
        return view('admin.order.index', compact('orders'));
>>>>>>> Stashed changes
    }

    public function detail($orderId){
        $order = order::where('orderId', $orderId)->first();
        $detail = orderList::where('orderId', $orderId)->get();
        return view('admin.order.detail', compact('detail', 'order'));
    }

<<<<<<< Updated upstream
    public function search(Request $request){

        $search = $request->input('search');

        if ($request->has('search')) {
            $orders = order::where('orderId', 'LIKE', $request->search)->get();
        }
        else{
            $orders = order::all();
        }
        $searchResult = $orders->first() ?: null; // Assuming only one result for simplicity

        // dd($searchResult && $searchResult->orderStatus == 'Done');

        return view('admin.order.index', compact('orders', 'searchResult', 'search'));
    }

    public function accRefund($id){
        $order = order::where('orderId', $id)->first();

        $order->orderStatus = 'Refunded';
        $order->save();

        return redirect()->route('admin.home');

    }

    public function rejRefund($id){
        $order = order::where('orderId', $id)->first();

        $order->orderStatus = 'Rejected';
        $order->save();

        return redirect()->route('admin.home');

    }
=======
>>>>>>> Stashed changes

}
