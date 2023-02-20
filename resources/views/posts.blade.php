@extends('layouts.app')

@section('content')
    <h1 class="mb-4 display-5 text-center">{{ $title }}</h1>

    {{-- Search --}}
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>

            </form>
        </div>
    </div>

    @if ($posts->count())
        {{-- Big One --}}
        <div class="card mb-3 text-center">

            {{-- Post Image --}}
            @if ($posts[0]->image)
                <div style="max-height: 450px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid my-3"
                        alt="{{ $posts[0]->category->name }}">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x600/?{{ $posts[0]->category->name }}" class="img-fluid my-3"
                    alt="{{ $posts[0]->category->name }}">
            @endif

            <div class="card-body">

                {{-- Post Title --}}
                <h3 class="card-title">
                    <a class="text-decoration-none text-dark" href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
                </h3>

                {{-- Post Author and Category --}}
                <h5 class="text-muted">By <a href="/posts?author={{ $posts[0]->author->username }}"
                        class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                        href="/posts?category={{ $posts[0]->category->slug }}"
                        class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                </h5>

                {{-- Post Excerpt --}}
                <div class="card-text lead">{{ $posts[0]->excerpt }}</div>

                {{-- Post Created at --}}
                <p class="card-text"><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>

                {{-- Read more --}}
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More</a>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-2">
                        <div class="card">

                            {{-- Post Category --}}
                            <div class="position-absolute bg-dark px-2 py-1 rounded bg-opacity-50" style="">
                                <a class="text-decoration-none text-white"
                                    href="/posts?category={{ $post->category->slug }}">
                                    {{ $post->category->name }}
                                </a>
                            </div>

                            {{-- Post Image --}}
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid my-3"
                                    alt="{{ $post->category->name }}">
                            @else
                                <img src="https://source.unsplash.com/1200x600/?{{ $post->category->name }}"
                                    class="img-fluid my-3" alt="{{ $post->category->name }}">
                            @endif

                            <div class="card-body">

                                {{-- Post Title --}}
                                <h5 class="card-title">
                                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                                        {{ $post->title }}
                                    </a>
                                </h5>

                                {{-- Post Author and Created at --}}
                                <p class="text-muted">By <a href="/posts?author={{ $post->author->username }}"
                                        class="text-decoration-none">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </p>

                                {{-- Post Excerpt --}}
                                <div class="lead">
                                    {!! $post->excerpt !!}
                                </div>

                                {{-- Read More --}}
                                <a href="/posts/{{ $post->slug }}" class="text-decoration-none mt-2 d-block">Read
                                    more..</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="lead text-center fs-4">No Posts Found!</p>
    @endif

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
@endsection
