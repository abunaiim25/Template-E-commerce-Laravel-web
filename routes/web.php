<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\admin\OrderadminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\RatingController;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; /*add*/


/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

//profile
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//==============font section===========
Route::get('/',[FontendController::class,'index']);



Route::middleware(['auth', 'isAdmin'])->group(function(){
//===========admin section============
Route::get('dashboard',[HomeController::class,'admin']);

//=========admin category section===========
Route::get('admin/category',[CategoryController::class,'index']);
Route::post('store-category',[CategoryController::class,'store']);
Route::get('admin/categories/edit/{cat_id}',[CategoryController::class,'edit']);
Route::post('update-category',[CategoryController::class,'update']);
Route::get('admin/categories/delete/{cat_id}',[CategoryController::class,'Delete']);
Route::get('admin/categories/inactive/{cat_id}',[CategoryController::class,'Inactive']);
Route::get('admin/categories/active/{cat_id}',[CategoryController::class,'Active']);

//=========admin Brand section==============
Route::get('admin/brand',[BrandController::class,'index']);
Route::post('store-brand',[BrandController::class,'store']);
Route::get('admin/brand/edit/{brand_id}',[BrandController::class,'edit']);
Route::post('update-brand',[BrandController::class,'update']);
Route::get('admin/brand/delete/{brand_id}',[BrandController::class,'Delete']);
Route::get('admin/brand/inactive/{brand_id}',[BrandController::class,'Inactive']);
Route::get('admin/brand/active/{brand_id}',[BrandController::class,'Active']);

//===========admin products section================
Route::get('admin/products/add',[ProductController::class,'addProduct']);
Route::post('store-products',[ProductController::class,'storeProduct']);
Route::get('admin/products/manage',[ProductController::class,'manageProduct']);
Route::get('admin/products/edit/{product_id}',[ProductController::class,'editProduct']);
Route::post('update-products',[ProductController::class,'updateProduct']);
Route::post('update-image',[ProductController::class,'updateImage']);
Route::get('admin/products/delete/{product_id}',[ProductController::class,'Delete']);
Route::get('admin/products/inactive/{product_id}',[ProductController::class,'Inactive']);
Route::get('admin/products/active/{product_id}',[ProductController::class,'Active']);

//=============admin Cupon section===============
Route::get('admin/coupon',[CouponController::class,'index']);
Route::post('store-coupon',[CouponController::class,'store']);
Route::get('admin/coupon/edit/{coupon_id}',[CouponController::class,'couponEdit']);
Route::post('update-coupon',[CouponController::class,'update']);
Route::get('admin/coupon/delete/{coupon_id}',[CouponController::class,'Delete']);
Route::get('admin/coupon/inactive/{coupon_id}',[CouponController::class,'Inactive']);
Route::get('admin/coupon/active/{coupon_id}',[CouponController::class,'Active']);

//=============admin orders section===============
Route::get('admin/orders',[OrderadminController::class,'orderIndex']);
Route::get('admin/orders/view/{order_id}',[OrderadminController::class,'viewOrder']);

//=============admin main section===============
Route::get('admin/main',[MainController::class,'index']);
Route::put('admin-main-update',[MainController::class,'update']);

});




//=============fronted Cart section===============
Route::post('add/to-cart/{product_id}',[CartController::class,'addToCart']);
Route::get('cart',[CartController::class,'cartPage']);
Route::get('cart/destroy/{cart_id}',[CartController::class,'destroy']);
Route::post('cart/quantity/update/{cart_id}',[CartController::class,'quantityUpdate']);
//coupon
Route::post('coupon/apply',[CartController::class,'applyCoupon']);
Route::get('coupon/destroy',[CartController::class,'couponDestroy']);

//=============fronted Wishlist section===============
Route::get('add/to-wishlist/{product_id}',[WishlistController::class,'addToWishlist']);
Route::get('wishlist',[WishlistController::class,'wishPage']);
Route::get('wishlist/destroy/{wishlist_id}',[WishlistController::class,'destroy']);

//=============Product details section=============
Route::get('proudct/details/{product_id}',[FontendController::class,'productDetail']);
//shop
Route::get('shop/page',[FontendController::class,'shopPage']);
//caregorywise product show  
Route::get('category/product-show/{id}',[FontendController::class,'catWiseProduct']);

//=============Product checkout section=============
Route::get('checkout',[CheckoutController::class,'index']);
//OrderController
Route::post('place-order',[OrderController::class,'storeOrder']);
Route::get('order/success',[OrderController::class,'orderSuccess']);

//=============Product Profile section=============
Route::get('user.order',[UserController::class,'order']);
Route::get('user/order-view/{id}',[UserController::class,'orderView']);

//=============Contact section=============
Route::get('contactView',[ContactFormController::class,'contactView']);
Route::post('/contact-email', [ContactFormController::class, 'store'])->name('contact.store');

//=============rating section=============
Route::post('add-rating',[RatingController::class,'addrating']);


