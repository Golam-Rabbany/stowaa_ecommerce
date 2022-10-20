@extends('frontend.layouts.master')

@section('frontend')
    

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Account</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Account</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

     <!-- breadcrumb-area end -->

     <div class="tab-pane fade" id="orders">
        <h4>Orders</h4>
        <div class="table_page table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Photo</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_data as $data)
                        @foreach ($data->orderRel as $order)
                            @foreach ($order->productRel as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <img class="w-20 h-20" src="{{asset('uploads/product/'.$product->photo)}}" alt="">
                                    </td>
                                    <td>{{$product->sale_price}}</td>
                                    <td>{{$order->quantity}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
                {{-- <tbody>
                    @foreach ($order_data as $data)
                        @foreach ($data->orderRel as $order)
                            @foreach ($order->productRel as $products)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$products->name}}</td>
                                    <td><span class="success">Completed</span></td>
                                    <td>${{$data->total_amount}} </td>
                                    <td><a href="cart.html" class="view">view</a></td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>

@endsection