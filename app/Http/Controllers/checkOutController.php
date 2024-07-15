<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\order;
use App\Models\orderList;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Stmt\Foreach_;

class checkOutController extends Controller
{
   public function addOrder(Request $request)
   {
      $user = Auth::user();
      $userId = $user->id;

      $orderRequest = $request->input("selectedItems");
      if (!Auth::check()) {
         return redirect()->route('login')->with('error', 'You are not logged in.');
      }

      $request->validate([
         'optionPayment' => 'required',
         'addressEmpty' => 'required'
      ]);

      // $courier = User::where('uType', "courier")->select('users.id')->get();
      // // $courier = $courier->id;
      // // Get the random element
      // $courier = $courier[array_rand($courier)];
      $couriers = User::where('utype', "courier")->pluck('id')->toArray();
      // Check if there are couriers available
      
      // Select a random courier ID
      $randomCourierId = $couriers[array_rand($couriers)];
      
      // Retrieve the courier details using the random ID

      $input = $request->input("deliveryTime");
      // Split the input string into date and time parts
      // list($date, $month) = explode(' ', $input);
      list($date, $month, $timeRange) = explode(' ', $input);
      $date = $date . ' ' . $month;
      // Extract the start time
      list($startTime, $endTime) = explode('-', $timeRange);
      // Concatenate date with start time
      $datetimeString = $date . ' ' . $startTime;
      // Convert the string into a DateTime object
      $datetime = DateTime::createFromFormat('d M H:i', $datetimeString);
      // Format the DateTime object into MySQL timestamp format
      $mysqlTimestamp = $datetime->format('Y-m-d H:i:s');

      $order = new order([
         'userId' => $userId,
         'courierId' => $randomCourierId,
         'created_at' => Carbon::now(),
         'updated_at' => Carbon::now(),
         'orderStatus' => "Packing",
         'deliveryTime' => $mysqlTimestamp,
         'payment' => $request->input('optionPayment'),
         'addressId' => $request->input("addressId")
      ]);
      $order->save();
      foreach ($orderRequest as $req) {
         $quant = User::join("cart", "cart.userId", "=", "users.id")
         ->join("cartList", "cartList.cartId", "=", "cart.cartId")
         ->select("cartList.quantity")
         ->where("users.id", $userId)
         ->where("cartList.productId", $req)
         ->first();
         $orderDetail = new orderList([
            'orderID' => $order->orderId,
            'productId' => $req,
            'quantity' => $quant->quantity
         ]);
         $orderDetail->save();
      };
      
      // dd($orderDetail);
   }

   //    public function addCart($id)
   //    {
   //       $productId = $id;
   //       $user = Auth::user();

   //       if (!Auth::check()) {
   //          return redirect()->route('login')->with('error', 'You are not logged in.');
   //       }

   //       $userId = $user->id;

   //       // Ensure the user has a cart
   //       $cart = cart::firstOrCreate(['userId' => $userId]);

   //       // Check if the product already exists in the user's cart
   //       $cartItem = cartList::where('cartId', $cart->cartId)->where('productId', $productId)->first();

   //       if ($cartItem) {
   //          // If the product exists, increment the quantity
   //          $cartItem->quantity += 1;
   //       } else {
   //          // If the product does not exist, create a new cart entry
   //          $cartItem = new cartList([
   //             'cartId' => $cart->cartId,
   //             'productId' => $productId,
   //             'quantity' => 1
   //          ]);
   //       }

   //       $cartItem->save();

   //       return redirect()->back()->with('success', 'Product added to cart');
   //    }
   //    public function checkout(Request $request){
   //       $user = Auth::user();

   //       $addressId = $request->input('addressId');

   //       $addresses = $user->addresses;
   //       $firstAddress = address::find($addressId) ?? $addresses->first();

   //       $selectedItems = $request->input('selectedItems');

   //       $cartId = $user->cart->cartId;

   //       $cartItems = cartList::whereIn('productId', $selectedItems)->where('cartId', $cartId)->get();

   //       $selectedDeliveryTime = $request->input('selectedDeliveryTime');
   //       if(str_contains($selectedDeliveryTime, 'Today') | str_contains($selectedDeliveryTime, 'Tomorrow')){
   //           $dateTimeParts = explode(' ', $selectedDeliveryTime);
   //           $selectedDate = $dateTimeParts[0] . ' ' . $dateTimeParts[1];
   //           $selectedTime = $dateTimeParts[3];
   //           $selectedDeliveryTime = $selectedDate . ' ' . $selectedTime;
   //       }elseif(str_contains($selectedDeliveryTime, '2 more Days')){
   //           $dateTimeParts = explode(' ', $selectedDeliveryTime);
   //           $selectedDate = $dateTimeParts[0] . ' ' . $dateTimeParts[1];
   //           $selectedTime = $dateTimeParts[5];
   //           $selectedDeliveryTime = $selectedDate . ' ' . $selectedTime;
   //       }

   //       return view('checkout', compact('cartItems', 'addresses', 'firstAddress','selectedDeliveryTime'));
   //   }
}
