@extends('layouts.admin')

@section('content')
    <h2>{{ $dish->name }}</h2>
    <p>Slug: {{ $dish->slug }}</p>
    <p>Price: {{ $dish->price }}</p>
    <p>Description: {{ $dish->description }}</p>
@endsection