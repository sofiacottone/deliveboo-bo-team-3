@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Il tuo ristorante') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div><span class="fw-bold">Nome: </span>{{ $user->restaurant->restaurant_name }}</div>
                        <div><span class="fw-bold">Indirizzo: </span>{{ $user->restaurant->address }}</div>
                        <div><span class="fw-bold">P.Iva: </span>{{ $user->restaurant->VAT_no }}</div>
                        <div><span class="fw-bold">Categoria: </span>
                            @foreach ($user->restaurant->categories as $category)
                                <div class="badge text-bg-primary">{{ $category->name }}</div>
                            @endforeach
                        </div>
                        @if ($user->restaurant->description)
                            <div><span class="fw-bold">Descrizione: </span>{{ $user->restaurant->description }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
