@extends('admin.layouts.master')

@section('dashboard')
    <div class="flex justify-between">
        <div></div>
        <div class="mr-5 mt-3">
            <a href="{{route('category.create')}}" class="flex justify-center items-center rounded px-2 py-2 bg-sky-500 text-white ">Create Category</a>
        </div>
    </div>
@endsection