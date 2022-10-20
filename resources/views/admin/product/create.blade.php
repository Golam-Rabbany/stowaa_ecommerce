@extends('admin.layouts.master')

@section('dashboard')

<div class="flex justify-between">
  <div></div>
  <div class="mr-5 mt-3">
      <a href="{{route('product.index')}}" class="flex justify-center items-center rounded px-2 py-2 bg-sky-500 text-white ">View Product</a>
  </div>
</div>

<div class="w-full my-4  ">
  <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf

    @if (session()->get('success'))
        <div class="bg-green-500 text-xl text-white py-2 mb-4">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="flex flex-wrap mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          Category
        </label>
        <select name="category_id" id="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            <option value="">--select--</option>
            @foreach ($category_data as $data)
            <option value="{{$data->id}}">{{$data->title}}</option>
            @endforeach
        </select>
      </div>
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          Product Name
        </label>
        <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" >
        
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
          Product Photo
        </label>
        <input name="photo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="file">
      </div>
    </div>

    <div class="flex flex-wrap mb-2">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
        Product Main Price
        </label>
        <input name="main_price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text">
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
        Product Sale Price
        </label>
        <input name="sale_price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text">
    </div>

    </div>
    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          Product Description
        </label>
        <textarea name="desc" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" ></textarea>
        
      </div>
    <div class="ml-4">
        <div class="flex flex-wrap mb-3">
            <button class="px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
        </div>
    </div>


  </form>
</div>
@endsection