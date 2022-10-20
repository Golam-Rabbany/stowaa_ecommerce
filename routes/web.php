<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User2Controller;
use App\Models\Product;
use App\Models\User2;
use Illuminate\Support\Facades\Session;


Route::resource('userss', User2Controller::class);

Route::get('/', function () {
        $cart = Session::get('cart', []);
        $products = Product::select(['id', 'name', 'main_price', 'sale_price', 'quantity' , 'photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

         $carts = collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });
    return view('welcome',compact('carts'));
})->name('frontpage');



Route::get('/one-product/{id}', [ProductController::class, 'single_product'])->name('one.product');
Route::get('/account', [FrontendController::class, 'account'])->name('account');
Route::get('/account_orders/{id}', [FrontendController::class, 'orders'])->name('account.orders');


Route::get('/product_details/{id}', [ProductController::class, 'product_details'])->name('product_details');
Route::resource('/cart', CartController::class);

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('test',function(){
        return  view('frontend.page.cart');
    });
    
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::resource('/order', OrderController::class);
    Route::get('/product_orders', [OrderController::class, 'product_orders'])->name('product_orders');
    Route::get('/cart_delete', [CartController::class, 'del'])->name('cart.del');

    Route::get('/order_status', [OrderController::class, 'status'])->name('order.status');

});

Route::get('/demo', function(){
    $data = User2::all();
    return view('demo.demo',compact('data'));
});

require __DIR__.'/auth.php';

