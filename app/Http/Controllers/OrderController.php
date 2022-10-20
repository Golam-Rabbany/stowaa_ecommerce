<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {
        $order_data = Order::all();
        return view('admin.order.index',compact('order_data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:11|max:11',
            'state'=>'required',
            'area'=>'required',
            'street'=>'required',
        ]);


        if(Auth::user()){
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->total_amount = $request->total_amount;
            $order->state = $request->state;
            $order->area = $request->area;
            $order->street = $request->street;
            $order->postcode = $request->postcode;
            $order->additional_info = $request->additional_info;
            $order->save();

            
            foreach(Session::get('cart') as $item){
                $product = new ProductOrder();
                $product->order_id = $order->id;
                $product->product_id = $item['product_id'];
                $product->quantity = $item['quantity'];
                $product->sale_price = $item['sale_price'];
                $product->save();
                
        }
        Session::forget('cart');
        return redirect()->route('frontpage')->with('success', 'Order Successfully Completed');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function show($id)
    {
        $details = Order::with(['orderRel.productRel'])->where('id',$id)->first();

        return view('admin.order.show',compact('details'));
        // return $product_order = Order::with('orderProduct.allProduct.allCategory')->where('id', $id)->get();
        // return view('admin.order.product_order.index',compact('product_order'));
    }


    public function edit($id)
    {
        $status_data = Order::find($id);
        return view('admin.order.status',compact('status_data'));
    }

    public function update(Request $request, $id)
    {
        $update_status = Order::find($id);
        $update_status->status = $request->status;
        $update_status->update();
        return redirect()->route('order.index');
    }

    public function destroy($id)
    {
        $del = Order::find($id);
        $del->delete(); 
        return back();
    }

    public function status($id){
        
    }

    // public function product_orders(){
    //     return Order::get();
        
    // }
}
