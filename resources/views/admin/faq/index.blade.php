@extends('layout.dashboard')

@section('content')

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            FAQ's
        </h1>
        <a href="{{route('faq.create')}}" class="button light">Create a new FAQ</a>
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
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $faq)
                        <tr>
                            <td>{{$faq->id}}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{!! $faq->answer !!}</td>
                            <td>
                                <a href="{{ route('faq.edit', $faq->id) }}" class="button small blue">Edit</a>
                                <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button small red">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

@endsection