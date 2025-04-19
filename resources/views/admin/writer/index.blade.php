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
                            <th>Writer Image</th>
                            <th>Writer Name</th>
                            <th>Writer Slug</th>
                            <th>Writer No</th>
                            <th>Writer Rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($writers as $writer)
                        <tr>
                            <td>
                                {{$writer->id}}
                            </td>
                            <td>
                                <img src="{{ asset('storage/'.$writer->image) }}" alt="Writer Image" class="w-16 h-16 rounded-full object-cover">
                            </td>
                            <td class="capitalize">{{ $writer->name }}</td>
                            <td>{{$writer->slug}}</td>
                            <td>{{ $writer->writer_no }}</td>
                            <td>
                                @for($i = 0; $i < $writer->rating; $i++)
                                    <span class="icon"><i class="mdi mdi-star text-yellow-500"></i></span>
                                @endfor
                                @for($i = $writer->rating; $i < 5; $i++)
                                    <span class="icon"><i class="mdi mdi-star-outline"></i></span>
                                @endfor
                            </td>
                            <td>
                                @if($writer->status == 'active')
                                    <span class="tag green inline-block">Active</span>
                                @else
                                    <span class="tag red inline-block">Inactive</span>
                                @endif
                            </td>
                            
                            <td>
                                <a href="{{ route('writer.edit', $writer->id) }}" class="button small light">Edit</a>
                                <form action="{{ route('writer.destroy', $writer->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button small red">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-center mt-4">
                    {{ $writers->links() }}
                </div>
            </div>
        </div>
    </div>

</section>

@endsection