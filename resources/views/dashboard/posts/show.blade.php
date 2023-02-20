@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 py-4">
                {{-- Post Title --}}
                <h3>
                    {{ $post->title }}
                </h3>

                {{-- Back to Posts --}}
                <a href="/dashboard/posts" class="btn btn-primary py-2">
                    <span data-feather="arrow-left"></span>
                    My Posts
                </a>

                {{-- Edit --}}
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning py-2 text-white">
                    <span data-feather="edit"></span>
                    Edit
                </a>

                {{-- Delete --}}
                <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger py-2 border-0" onclick="return confirm('Are you sure?')">
                        <span data-feather="trash"></span> Delete
                    </button>
                </form>

                {{-- Post Image --}}
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid my-3"
                        alt="{{ $post->category->name }}">
                @else
                    <img src="https://source.unsplash.com/1200x600/?{{ $post->category->name }}" class="img-fluid my-3"
                        alt="{{ $post->category->name }}">
                @endif


                {{-- Body --}}
                <div class="lead">
                    {!! $post->body !!}
                </div>

                {{-- Back to Posts --}}
                <a href="{{ URL::previous() }}" class="text-decoration-none">Back to posts</a>

            </div>
        </div>
    </div>
@endsection
