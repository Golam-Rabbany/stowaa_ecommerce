@extends('admin.layouts.master')

@section('dashboard')

<div class="m-3">
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-4">
                <h4 class="page-title">Invoice</h4>
            </div>
            <div class="col-sm-7 col-8 text-right m-b-30">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-white">CSV</button>
                    <button class="btn btn-white">PDF</button>
                    <a onclick="window.print()" class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row custom-invoice">
                            <div class="col-6 col-sm-6 m-b-20">
                                <img src="assets/img/logo-dark.png" class="inv-logo" alt="">
                                <ul class="list-unstyled">
                                    <li>MMITSOFT</li>
                                    <li>Jhigatola, Dhanmondi,</li>
                                    <li>Dhaka, Bangladesh</li>
                                </ul>
                            </div>
                            <div class="col-6 col-sm-6 m-b-20">
                                <div class="invoice-details">
                                    <h3 class="text-uppercase">Invoice #INV-{{rand(1,10000)}}</h3>
                                    <ul class="list-unstyled">
                                        <li>Date: <span>{{$details->created_at}}</span></li>
                                        <li>Last Date: <span>{{$details->created_at}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 m-b-20">
                                
                                    <h5>Invoice to:</h5>
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5><strong>{{$details->name}}</strong></h5>
                                        </li>
                                        <li>{{$details->email}}</li>
                                        <li>{{$details->phone}}</li>
                                        
                                    </ul>
                                
                            </div>
                            <div class="col-sm-6 col-lg-6 m-b-10">
                                <div class="invoices-view">
                                    <ul class="list-unstyled invoice-payment-details">
                                        
                                        <li>City: <span>{{$details->state}}</span></li>
                                        <li>Area: <span>{{$details->area}}</span></li>
                                        <li>Street: <span>{{$details->street}}</span></li>
                                        <li>Post Code: <span>{{$details->postcode}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Photo</th>
                                        <th>Amount</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details->orderRel as $detail)
                                    @foreach ($detail->productRel as $product_data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="">{{$product_data->name}}</a></td>
                                            <td>
                                                <img class="w-20 h-20" src="{{asset('uploads/product/'.$product_data->photo)}}" alt="">
                                            </td>
                                            <td>${{$product_data->sale_price}}</td>
                                            <td>{{$detail->quantity}}</td>
                                            <td><span class="custom-badge status-green">Paid</span></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="invoice-view.html"><i class="fa fa-eye m-r-5"></i> View</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-file-pdf-o m-r-5"></i> Download</a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div class="row invoice-payment">
                                <div class="col-sm-7">
                                </div>
                                <div class="col-sm-5">
                                    <div class="m-b-20">
                                        <h6>Amount</h6>
                                        <div class="table-responsive no-border">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Subtotal:</th>
                                                        <td class="text-right">${{$details->total_amount -20}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Shipping: <span class="text-regular"></span></th>
                                                        <td class="text-right">${{$shipping_charge = 20}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-primary fs-1">Total:</th>
                                                        <td class="text-right text-primary">
                                                            <h5 class="text-primary fs-1 bold">${{$details->total_amount}}</h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-info">
                                <h5>Other information</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero, eu finibus sapien interdum vel</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection