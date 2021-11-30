<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CouponController extends Controller
{
   public function index(){
       $coupons = Coupon::latest()->get();
       return view('admin.coupon.index',compact('coupons'));
   }

//    ============= coupon store =========
   public function store(Request $request){

    $request->validate([
        'coupon_name' => 'required',
        'discount' => 'required'
    ]);
    
       Coupon::insert([
        'coupon_name' => strtoupper($request->coupon_name),
        'discount' => $request->discount,
        'created_at' => Carbon::now(),
       ]);

       return Redirect()->back()->with('success','Coupon added');
   }

   public function couponEdit($coupon_id){
       $coupon = Coupon::findOrFail($coupon_id);
       return view('admin.coupon.edit',compact('coupon'));
   }


   //update
   public function update(Request $request){
       $coupon_id = $request->id;
    Coupon::findOrFail($coupon_id)->update([
        'coupon_name' => strtoupper($request->coupon_name),
        'discount' => $request->discount,
        'updated_at' => Carbon::now(),
       ]);

       return Redirect('admin/coupon')->with('success','Coupon Updated');
   }


//delete
   public function Delete($coupon_id){
       Coupon::findOrFail($coupon_id)->delete();
       return Redirect()->back()->with('delete','Coupon Deleted');
   }


    // status inactive
    public function Inactive($coupon_id){
        Coupon::find($coupon_id)->update(['status' => 0]);
        return Redirect()->back()->with('status_inactive','Coupon inactive');
    }


    // status inactive
    public function Active($coupon_id){
        Coupon::find($coupon_id)->update(['status' => 1]);
        return Redirect()->back()->with('status','Coupon Activated');
    }


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
