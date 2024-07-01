@extends('layouts.admin')

@section('content')
    <div class="card mb-3 mx-5 my-5 ">
        <div class="card-body">
            <h5 class="card-title"><small><strong>Titolo: </strong></small>{{ $dish->name }}</h5>
            <p class="card-text"><strong>Prezzo: </strong>{{ $dish->price }}€</p>
            <p class="card-text"><strong>Descrizione: </strong>{{ $dish->description }}</p>
            <p class="card-text"><small class="text-body-secondary"><strong>Aggiornato il: </strong>{{ $dish->updated_at->format('d/m/Y G:H:s') }}</small></p>
        </div>
        @if ($dish->image)
            <div>
                <img src="{{ asset('storage/' . $dish->image) }}" class="card-img-bottom img-fluid p-5 rounded"
                    alt="{{ $dish->name }}">
            </div>
        @else
            <p class="px-3">Non è ancora stata caricata nessuna immagine :(</p>
            <img class="card-img-bottom img-fluid p-5 rounded" src="{{ Vite::asset('resources/img/placeholder.svg') }}"
                alt="Immagine di placeholder">
        @endif
    </div>
@endsection
