@extends('layout.dashboard')

@section('content')

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Writers
        </h1>
        <a href="{{route('writer.create')}}" class="button light">Create a new page</a>
    </div>
</section>

@endsection