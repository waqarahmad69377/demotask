@extends('layout.dashboard')

@section('content')

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Pages
        </h1>
        <a href="{{route('page.create')}}" class="button light">Create a new page</a>
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
                                <th>Page Image</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <td>{{$page->id}}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$page->page_image) }}" alt="Page Image" class="w-16 h-16 rounded-full object-cover">
                                </td>
                                <td>{{ $page->title }}</td>
                                <td>{{$page->slug}}</td>
                                <td>
                                    @if($page->status == 'active')
                                        <span class="small button green font-bold">Active</span>
                                    @else
                                        <span class="small button red font-bold">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('page.edit', $page->id) }}" class="button small blue">Edit</a>
                                    <form action="{{ route('page.destroy', $page->id) }}" method="POST" style="display:inline-block;">
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