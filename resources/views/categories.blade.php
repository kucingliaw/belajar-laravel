@extends('layouts.app')

@section('content')
    <h1 class="mb-4 display-5">{{ $title }}</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 my-2">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/500x500/?{{ $category->name }}" alt="{{ $category->name }}"
                                class="card-img">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill bg-dark bg-opacity-50 p-3 w-100">
                                    {{ $category->name }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
