<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderadminController extends Controller
{
    //

     // =================== Order ==========================
     public function orderIndex(){
        $orders = Order::latest()->get();
        return view('admin.order.index',compact('orders'));
    }

    //view orders //
    public function viewOrder($order_id){
        $order = Order::findOrFail($order_id);
        $orderItems = OrderItem::where('order_id',$order_id)->get();
        $shipping = Shipping::where('order_id',$order_id)->first();
        return view('admin.order.view',compact('order','orderItems','shipping'));
    }

}
