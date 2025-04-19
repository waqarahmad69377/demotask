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


<section class="section main-section">

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-1 mb-6">
        <div class="card w-full">
            <div class="card-content w-full">
                <table class="table is-striped is-hoverable is-fullwidth w-full">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td><a href="{{ route('admin.customer.edit', $customer->id) }}" class="button is-small">Edit</a></td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

@endsection