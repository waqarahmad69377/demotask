@extends('layout.dashboard')
@section('content')


<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Customer Details
        </h1>
        <a href="{{route('customer.index')}}" class="button light">Back to customers</a>
    </div>
</section>



@endsection