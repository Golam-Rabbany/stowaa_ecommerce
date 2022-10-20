<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $category_data = Category::all();
        return view('admin.product.create',compact('category_data'));
    }

    public function store(Request $request)
    {
        $product_data = new Product();
        $product_data->category_id = $request->category_id;
        $product_data->name = $request->name;
        $product_data->main_price = $request->main_price;
        $product_data->sale_price = $request->sale_price;
        $product_data->desc = $request->desc;
        $product_data->sku = Str::slug($request->name.rand());
        if($request->hasFile('photo')){
            $uploaded = $request->file('photo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/product/',$filename);
            $product_data->photo=$filename;
        }
        $product_data->save();
        return back()->with('success', 'Product added successfully');
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
        //
    }

    public function destroy($id)
    {
        //
    }

    public function product_details($id){
        $data = Product::where('id', $id)->first();
        return view('backend.product.product_details');
    }

    public function single_product($id){
        $single_product = Product::where('id', $id)->first();
        return view('frontend.product.single_product',compact('single_product'));
    }


}
