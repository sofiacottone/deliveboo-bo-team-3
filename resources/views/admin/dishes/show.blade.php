@extends('layouts.admin')

@section('content')
    <h2>{{ $dish->name }}</h2>
    <p>Slug: {{ $dish->slug }}</p>
    <p>Price: {{ $dish->price }}</p>
    <p>Description: {{ $dish->description }}</p>
    <div>
        <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
    </div>
@endsection
