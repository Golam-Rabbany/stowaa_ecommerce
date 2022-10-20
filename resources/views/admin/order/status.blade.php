@extends('admin.layouts.master')

@section('dashboard')
<form action="{{route('order.update',$status_data->id)}}" method="POST">
    @csrf
    @method('PUT')
    <select name="status" id="" class="w-1/2 mt-4 ">
        <option value="1" @if($status_data->status== 1) selected @endif>Pending</option>
        <option value="2" @if($status_data->status== 2) selected @endif>Approve</option>
        <option value="0" @if($status_data->status== 0) selected @endif>Cancel</option>
    </select><br>
    <button type="submit" class="bg-sky-500 px-4 py-2 text-white mt-3 ml-2">Submit</button>
</form>
@endsection