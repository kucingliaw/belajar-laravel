@extends('layouts.app')

@section('content')
    <h1>Halaman {{ $title }}</h1>
    <h3>Nama : {{ auth()->user()->name }}</h3>
    <p>{{ auth()->user()->email }}</p>
    <img src="/img/{{ $image }}" alt="{{ auth()->user()->name }}" width="300">
@endsection
