@extends('layout.dashboard')

@section('content')

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Customers
        </h1>
        <a href="{{route('customer.create')}}" class="button light">Create a new customer</a>
    </div>
</section>

@if(Session::has('success'))
<div class="notification green">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
      <div>
        <span class="icon"><i class="mdi mdi-buffer"></i></span>
        <b> {{ Session::get('success') }}</b>
      </div>
      <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
    </div>
  </div>
@endif

<section class="section main-section">

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-1 mb-6">
        <div class="card w-full">
            <div class="card-content w-full">
                <table class="table is-striped is-hoverable is-fullwidth w-full">
                    <thead>
                        <tr>
                            <th>Sr no</th>
                            <th>Customer Image</th>
                            <th>Customer Name</th>
                            <th>Custsomer No</th>
                            <th>Customer Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>
                                <img src="{{ asset('storage/'.$customer->image) }}" alt="Customer Image" class="w-16 h-16 rounded-full">
                            </td>
                            <td class="capitalize">{{ $customer->name }}</td>
                            <td>{{ $customer->cust_no }}</td>
                            <td>
                                {{-- rating with stars --}}
                                @for($i = 0; $i < $customer->rating; $i++)
                                    <span class="icon"><i class="mdi mdi-star"></i></span>
                                @endfor
                                @for($i = $customer->rating; $i < 5; $i++)
                                    <span class="icon"><i class="mdi mdi-star-outline"></i></span>
                                @endfor
                                {{-- {{$customer->rating}} --}}
                            </td>
                            <td><a href="{{ route('customer.edit', $customer->id) }}" class="button is-small">Edit</a> <form action="{{route('customer.destroy', $customer->id)}}" method="POST" class="inline-block">@csrf @method('delete')<button type="submit" class="button red">Delete</button></form></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $customers->links() }}
            </div>
        </div>
    </div>

</section>

@endsection