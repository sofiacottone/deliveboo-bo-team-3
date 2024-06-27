@extends('layouts.admin')

@section('content')
    
    @foreach ($restaurant->dishes as $dish)
    
        <div>{{ $dish->name }}</div>
    @endforeach
    test
    
@endsection
