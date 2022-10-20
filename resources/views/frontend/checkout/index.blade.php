@extends('frontend.layouts.master')

@section('frontend')
    
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Shop</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('frontpage')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('cart.index')}}">Cart</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    @if(session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
    @endif
<div class="text-center text-red-500 bold">
    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
</div>


    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="{{route('order.store')}}" method="POST" >
                        @csrf
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            <div class="row">
                            
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Name</label>
                                        <input name="name" type="text" value="{{Auth::user()->name}}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Email Address</label>
                                        <input name="email" type="text"  value="{{Auth::user()->email}}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Phone</label>
                                        <input name="phone" type="text" value="{{old('phone')}}" />
                                    </div>
                                </div>
                                

                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-select mb-4">
                                        <label>State / County</label>
                                        <select name="state">
                                            <option value="">Select a county</option>
                                            <option {{old('state') == 'dhaka' ? 'selected' : '' }} value="dhaka">Dhaka</option>
                                            <option {{old('state') == 'chattagram' ? 'selected' : '' }} value="chattagram">Chattagram</option>
                                            <option {{old('state') == 'rajshahi' ? 'selected' : '' }} value="rajshahi">Rajshahi</option>
                                            <option {{old('state') == 'khulna' ? 'selected' : '' }} value="khulna">Khulna</option>
                                            <option {{old('state') == 'barisal' ? 'selected' : '' }} value="barisal">Barisal</option>
                                            <option {{old('state') == 'sylhet' ? 'selected' : '' }} value="sylhet">Sylhet</option>
                                            <option {{old('state') == 'rangpur' ? 'selected' : '' }} value="rangpur">Rangpur</option>
                                            <option {{old('state') == 'mymansingh' ? 'selected' : ''}} value="mymansingh">Mymansingh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Area</label>
                                        <input name="area" type="text" value="{{old('area')}}" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Street Address</label>
                                        <input name="street" class="billing-address" value="{{old('street')}}" placeholder="House number and street name"
                                            type="text" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Postcode / ZIP</label>
                                        <input name="postcode" type="text" value="{{old('postcode')}}" />
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="additional-info-wrap">
                                <h4>Additional information</h4>
                                <div class="additional_info">
                                    <label>Order notes (not mandatory)</label>
                                    <textarea name="additional_info" value="{{old('additional_info')}}" placeholder="Notes about your order, e.g. special notes for delivery. "
                                        ></textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Product</li>
                                            <li>Total</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @php
                                                $sub_total = 0;
                                            @endphp
                                            @foreach ($carts as $cart_data)
                                                <li><span class="order-middle-left">{{$cart_data['product']->name}} X {{$cart_data['quantity']}}</span> <span
                                                class="order-price">${{$total_price = ($cart_data['quantity'] * $cart_data['sale_price'])}} </span></li>
                                                @php
                                                    $sub_total += $total_price; 
                                                @endphp
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Shipping</li>
                                            <li>$20</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Total</li>
                                            <li>${{$total_amount = $sub_total + 20}}</li>
                                            <input type="hidden" name="total_amount" value="{{$total_amount}}">
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <div id="faq" class="panel-group">
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-1" class="collapsed"
                                                            aria-expanded="true">Direct bank transfer</a>
                                                    </h4>
                                                </div>
                                                <div id="my-account-1" class="panel-collapse collapse show"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-2" aria-expanded="false"
                                                            class="collapsed">Check payments</a></h4>
                                                </div>
                                                <div id="my-account-2" class="panel-collapse collapse"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-3">Cash on delivery</a></h4>
                                                </div>
                                                <div id="my-account-3" class="panel-collapse collapse"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order mt-25">
                                <button class="btn-hover w-full bg-primary text-white py-2 fs-6" href="#">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- checkout area end -->
@endsection