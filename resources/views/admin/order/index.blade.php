@extends('admin.layouts.master')

@section('dashboard')

<table class="table-fixed border-collapse w-full border border-slate-500">
    <thead>
      <tr>
        <th class="border border-slate-600 py-3 text-center">Id</th>
        <th class="border border-slate-600 py-3 text-center">Email</th>
        <th class="border border-slate-600 py-3 text-center">Start Time</th>
        <th class="border border-slate-600 py-3 text-center">View</th>
        <th class="border border-slate-600 py-3 text-center">Status</th>
        <th class="border border-slate-600 py-3 text-center">Option</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($order_data as $order)
            <tr>
                <td class="border border-slate-600 py-3 text-center">{{$loop->iteration}}</td>
                <td class="border border-slate-600 py-3 text-center">{{$order->email}}</td>
                <td class="border border-slate-600 py-3 text-center">{{$order->created_at}}</td>
                <td class="border border-slate-600 py-3 text-center flex items-center mx-auto justify-center">
                    <a href="{{route('order.show',$order->id)}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                    </a>
                </td>   
                <td class="border border-slate-600 py-3 text-center">
                    @if ($order->status == 1)
                    <p class="text-blue-500 font-semibold"><a href="{{route('order.edit',$order->id)}}">Panding</a></p>
                    @elseif ($order->status == 2)
                    <p class="text-green-500 font-semibold"><a href="{{route('order.edit',$order->id)}}">Approve</a></p>
                    @else
                    <p class="text-red-500 font-semibold"><a href="{{route('order.edit',$order->id)}}">Cancel</a></p>
                    @endif
                </td>
                <td class="border border-slate-600 py-3 text-center flex items-center mx-auto justify-center">
                    <a href="" class="mx-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                    </a>
                     <form action="{{route('order.destroy',$order->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="mx-1" onclick="return confirm('Are you sure you want to delete?')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </form>

                </td>
            </tr>
      @endforeach

    </tbody>
  </table> 





@endsection