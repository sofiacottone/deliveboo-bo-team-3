@extends('layouts.admin')

@section('content')
    
    @foreach ($dishes as $dish)
    
        <div>{{ $dish->name }}</div>
    @endforeach
    test
    
@endsection
