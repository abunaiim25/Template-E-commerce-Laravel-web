<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Rating;
use App\Models\Main;
use Illuminate\Support\Facades\Auth;

class FontendController extends Controller
{

    public function index(){
        //latest for get 1
        $main = Main::first();
        $products = Product::where('status',1)->latest()->get();
        $lts_p = Product::where('status',1)->latest()->limit(3)->get();
        $categories = Category::where('status',1)->latest()->get();
        
        return view('pages.index',compact('products','categories','lts_p','main'));
    }

    // ----------- product details ---------
    public function productDetail($product_id){
        $main = Main::first();
        $product = Product::findOrFail($product_id);
        $category_id = $product->category_id;
        $related_p = Product::where('category_id',$category_id)->where('id','!=',$product_id)->latest()->get();

        //ratting
        $ratings = Rating::where('prod_id', $product_id)->get();
        $rating_sum = Rating::where('prod_id', $product_id)->sum('stars_rated');
        $user_rating = Rating::where('prod_id', $product_id)->where('user_id', Auth::id())->first();   
       
        //review 
        //ratting
        if($ratings->count() > 0)
        {
            $rating_value = $rating_sum/$ratings->count();
        }
        else
        {
            $rating_value = 0;//rating 0
        }
        return view('pages.product-deatails',compact('product','related_p','ratings','rating_value','user_rating','main'));
    }

    // ==================================== shop Page ===========================
    public function shopPage(){
        $main = Main::first();
        $products = Product::latest()->get();
        $productsp = Product::latest()->paginate(9);
        $lts_p = Product::where('status',1)->latest()->limit(3)->get();
        $categories = Category::where('status',1)->latest()->get();
        return view('pages.shop',compact('products','categories','productsp','lts_p','main'));
    }

    // categorywiese product
    public function catWiseProduct($cat_id){
        $main = Main::first();
        $products = Product::where('category_id',$cat_id)->latest()->paginate(9);
        $categories = Category::where('status',1)->latest()->get();
        $lts_p = Product::where('status',1)->latest()->limit(3)->get();
        return view('pages.cat-product',compact('products','categories','lts_p','main'));
    }


}
