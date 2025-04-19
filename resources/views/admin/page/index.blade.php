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


<section class="section main-section">
    
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-1 mb-6">
            <div class="card w-full">
                <div class="card-content w-full">
                    <table class="table is-striped is-hoverable is-fullwidth w-full">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td><a href="{{ route('admin.page.edit', $page->id) }}" class="button is-small">Edit</a></td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</section>

@endsection