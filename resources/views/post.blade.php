@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 py-4">
                {{-- Judul --}}
                <h3>
                    {{ $post->title }}
                </h3>

                {{-- Author and Category --}}
                <h5 class="text-muted">By <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in <a
                        href="/posts?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </h5>

                {{-- Post Image --}}
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid my-3"
                        alt="{{ $post->category->name }}">
                @else
                    <img src="https://source.unsplash.com/1200x600/?{{ $post->category->name }}" class="img-fluid my-3"
                        alt="{{ $post->category->name }}">
                @endif

                {{-- Body --}}
                <div class="lead mb-2">
                    {!! $post->body !!}
                </div>

                {{-- Back to Posts --}}
                <a href="{{ URL::previous() }}" class="text-decoration-none">Back to posts</a>

            </div>
        </div>
    </div>
@endsection
