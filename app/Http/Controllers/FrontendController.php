<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function account(){
       $order_data = Order::orderBy('id','Desc')->where('user_id', Auth::user()->id)->get();
        return view('frontend.account.index',compact('order_data'));
    }
    public function orders($id){
      $order_data = Order::with(['orderRel.productRel'])->where('id', $id)->get();
      // return $data = Order::all();
       return view('frontend.account.orders',compact('order_data'));
    }
}
