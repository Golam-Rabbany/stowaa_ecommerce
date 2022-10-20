<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index()
    {
        // return $cart = Session::get('cart');
        $cart = Session::get('cart', []);
        $products = Product::select(['id', 'name', 'main_price', 'sale_price', 'quantity' , 'photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

         $carts = collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });
        return view('frontend.cart.index',compact('carts'));
    }

    public function create()
    {
        return view('backend.cart.cart');
    }

    public function store(Request $request)
    {
        $already_on_cart = false;
        if($request->session()->has('cart')){
            $cartData = [];
            foreach(Session()->get('cart') as $cart_row ){
                if($cart_row['product_id'] == $request->product_id ){
                    $cart_row['quantity'] = $cart_row['quantity'] + $request->quantity;
                    $already_on_cart = true;
                }
                $cartData[] = $cart_row;
            }
            if($already_on_cart){
                Session::put('cart', $cartData);
            }
        }
        if(!$already_on_cart){
            Session::push('cart', [
                'product_id' => $request->product_id,
                'name' => $request->name,
                'quantity' => $request->quantity,
                'main_price' => $request->main_price,
                'sale_price' => $request->sale_price,
                'sku' => $request->sku,
            ]);
        }
        return back();
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $item = Session::get('cart', []);
        foreach ($item as $key => $cart) {
            if ($cart['product_id'] == $id) {
                $item[$key]['quantity'] = $request->quantity;
            }
        }
        Session::put('cart', $item);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Session::put('cart', array_filter(Session::get('cart', []), function ($item) use ($id) {
            return $item['product_id'] != $id;
        }));
        return back();
    }

    public function checkout(){
        $cart = Session::get('cart', []);
        $products = Product::select(['id','name','sale_price','photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

            $carts= collect($cart)->map(function ($data) use ($products) {
                $data['product'] = $products[$data['product_id']];
                return $data;
            });
        return view('frontend.checkout.index',compact('carts'));
    }

    public function del(){
        Session::forget('cart');
        return back();
    }
}
