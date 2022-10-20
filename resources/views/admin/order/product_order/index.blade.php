@extends('admin.layouts.master')

@section('dashboard')
<table class="table-fixed border-collapse w-full border border-slate-500">
    <thead>
      <tr>
        <th class="border border-slate-600 py-3 text-center">Id</th>
        <th class="border border-slate-600 py-3 text-center">Order_User</th>
        <th class="border border-slate-600 py-3 text-center">Product_Name</th>
        <th class="border border-slate-600 py-3 text-center">Quantity</th>
        <th class="border border-slate-600 py-3 text-center">Sale_Price</th>
        <th class="border border-slate-600 py-3 text-center">category Name</th>
        <th class="border border-slate-600 py-3 text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($product_order as $order_data)
        <tr>
            <td class="border border-slate-600 py-3 text-center">{{$loop->iteration}}</td>
            <td class="border border-slate-600 py-3 text-center">{{$order_data->user_id}}</td>
            <td class="border border-slate-600 py-3 text-center">{{$order_data->product_id}}</td>
            <td class="border border-slate-600 py-3 text-center">{{$order_data->quantity}}</td>
            <td class="border border-slate-600 py-3 text-center">{{$order_data->sale_price}}</td>
            <td class="border border-slate-600 py-3 text-center">{{$order_data->orderProduct->sale_price}}</td>
        </tr>
        @endforeach
        
    </tbody>
</table> 
@endsection