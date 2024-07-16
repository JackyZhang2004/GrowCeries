<?php

namespace App\Http\Controllers\courier;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// class HomeController extends Controller
// {
//     public function index()
//     {
//         $orders1 = Order::where('orderStatus', 'Packaged')->get();
//         $orders2 = Order::where('orderStatus', 'Shipped')->get();
//         return view('courier.home', compact('orders1', 'orders2'));
//     }

//     public function update($orderId)
//     {
//         $uporder = Order::where('orderId', $orderId)->first();

//         if ($uporder) {
//             if ($uporder->orderStatus == "Packaged") {
//                 $uporder->orderStatus = "Shipped";
//             } else if ($uporder->orderStatus == "Shipped") {
//                 $uporder->orderStatus = "Completed";
//             }
//             $uporder->save();

//             // Re-fetch the updated lists
//             $orders1 = Order::where('orderStatus', 'Packaged')->get();
//             $orders2 = Order::where('orderStatus', 'Shipped')->get();

//             // Calculate the total price for the updated order
//             $totalPrice = DB::table('transactionDetail as od')
//                 ->join('product as p', 'od.productId', '=', 'p.productId')
//                 ->where('od.orderId', $orderId)
//                 ->sum(DB::raw('p.price * od.quantity'));

//             return view('courier.home', compact('orders1', 'orders2', 'uporder', 'totalPrice'));
//         } else {
//             return redirect()->route('courier.home')->with('error', 'Order not found');
//         }
//     }
// }


class HomeController extends Controller
{
    public function index()
    {
        $orders1 = Order::where('orderStatus', 'Packing')->get();
        $orders2 = Order::where('orderStatus', 'Shipped')->get();
        $orders3 = Order::where('orderStatus', 'Done')->get();
        $orderDetail = orderList::all();
        return view('courier.home', compact('orders1', 'orders2','orders3', 'orderDetail'));
    }

    public function update($orderId)
    {
        $uporder = Order::where('orderId', $orderId)->first();

        if ($uporder) {
            if ($uporder->orderStatus == "Packing") {
                $uporder->orderStatus = "Shipped";
            } else if ($uporder->orderStatus == "Shipped") {
                $uporder->orderStatus = "Done";
            }
            $uporder->save();

            // Re-fetch the updated lists
            $orders1 = Order::where('orderStatus', 'Packing')->get();
            $orders2 = Order::where('orderStatus', 'Shipped')->get();
            $orders3 = Order::where('orderStatus', 'Done')->get();
            return view('courier.home', compact('orders1', 'orders2','orders3', 'uporder'));
        } else {
            return redirect()->route('courier.home')->with('error', 'Order not found');
        }
    }
}
