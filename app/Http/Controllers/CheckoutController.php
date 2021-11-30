<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
   public function index(){
       if (Auth::check()) {
           $carts = Cart::latest()->get();
           $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
         });
        return view('pages.checkout',compact('carts','subtotal'));
       }else{
        return redirect()->route('login');
       }
      
   }
}
