@extends('frontend.layouts.master')

@section('frontend')

<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                @foreach ($carts as $cart_data)
                <li>
                    <a href="single-product.html" class="image"><img src="{{asset('uploads/product/'.$cart_data['product']->photo)}}"
                            alt="Cart product Image"></a>
                    <div class="content">
                        <a href="single-product.html" class="title">{{$cart_data['product']->name}}</a>
                        <span class="quantity-price">{{$cart_data['product']->quantity}} x <span class="amount">${{$cart_data['product']->sale_price}}</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="foot">
            <div class="buttons mt-30px">
                <a href="{{route('cart.index')}}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                <a href="checkout.html" class="btn btn-outline-dark current-btn">checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- OffCanvas Cart End -->

 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Shop</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('frontpage')}}">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subtotal = 0;
                                @endphp
                                @if (Session::get('cart'))
                                @foreach ($carts as $cart_data)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img class="img-responsive ml-15px"
                                                src="{{asset('uploads/product/'.$cart_data['product']->photo)}}" alt="" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{$cart_data['product']->name}}</a></td>
                                    <td class="product-price-cart"><span class="amount">${{$price = $cart_data['product']->sale_price}}</span></td>
                                    <td class="product-quantity">
                                         {{-- <div class="cart-plus-minus">  --}}
                                        <form action="{{route('cart.update',$cart_data['product_id'])}}" method="POST" id="form">
                                            @csrf
                                            @method('PUT')


                                            <input class="cart-plus-minus-box w-20" type="number" onclick="form.submit()" min="1" name="quantity"
                                                value="{{$total_quantity = $cart_data['quantity']}}" />
                                        </form>
                                      {{-- </div>  --}}

                                        
                                    </td>
                                    <td class="product-subtotal">${{$total_price = $total_quantity * $price}}</td>
                                    <td class="product-remove">
                                        <div class="flex justify-center">
                                        <form action="{{route('cart.destroy',$cart_data['product_id'])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="fa fa-times"></i></button>
                                        </form>
                                    </div>
                                    </td>
                                    @php
                                        $subtotal = $subtotal + $total_price;
                                    @endphp
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                  <th colspan="50" class="text-red-500 text-center">Your cart is Empty</th>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="{{url('/')}}">Continue Shopping</a>
                                </div>
                                <div class="cart-clear">
                                    <a href="{{route('cart.del')}}">Clear Shopping Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
               
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-lm-30px">
                        <div class="cart-tax">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                            </div>
                            <div class="tax-wrapper">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <div class="tax-select-wrapper">
                                    <div class="tax-select">
                                        <label>
                                            * Country
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    {{-- <div class="tax-select">
                                        <label>
                                            * Region / State
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select mb-25px">
                                        <label>
                                            * Zip/Postal Code
                                        </label>
                                        <input type="text" />
                                    </div> --}}
                                    <button class="cart-btn-2" type="submit">Get A Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-lm-30px">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form>
                                    <input type="text" required="" name="name" />
                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-md-30px">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5>Total products <span>${{$subtotal}}</span></h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    <li><input type="checkbox" /> Standard <span>$20.00</span></li>
                                    <li><input type="checkbox" /> Express <span>$30.00</span></li>
                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Grand Total <span>${{$subtotal + 20}}</span></h4>
                            <a href="{{route('checkout')}}">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->
@endsection