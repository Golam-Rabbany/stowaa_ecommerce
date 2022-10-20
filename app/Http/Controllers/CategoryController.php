<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Image;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = new Category();
        $data->title = $request->title;

        if($request->hasFile('photo')){
            $uploaded = $request->file('photo');
            $extention=$uploaded->getClientOriginalName();
            $filename=time().rand(0,9999).'.'.$extention;
            $uploaded->move('uploads/category/',$filename);
            $data->photo=$filename;
        }
        $data->save();
        return back()->with('success', 'category created successfully');
    }

    public function show($id)
    {
        //
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
}
