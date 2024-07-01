@extends('layouts.admin')

@section('content')
    <div class="card mb-3 m-5">
        {{-- actions --}}
        <div class="d-flex justify-content-end align-items-center gap-2 mt-3 me-3">
            <a href="{{ route('admin.menu.edit', $dish->slug) }}" class="btn btn-outline-secondary">
                <i class="fa-solid fa-pencil"></i>
            </a>

            <form action="{{ route('admin.menu.destroy', ['dish' => $dish->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" data-dish-name="{{ $dish->name }}" class="js-delete-btn btn btn-outline-danger">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
        <div class="card-body">
            <h5 class="card-title"><small><strong>Titolo: </strong></small>{{ $dish->name }}</h5>
            <p class="card-text"><strong>Prezzo: </strong>{{ $dish->price }}€</p>
            <p class="card-text"><strong>Descrizione: </strong>{{ $dish->description }}</p>
            <p class="card-text"><small class="text-body-secondary"><strong>Aggiornato il:
                    </strong>{{ $dish->updated_at->format('d/m/Y G:H:s') }}</small></p>
        </div>
        @if ($dish->image)
            <div class="w-75">
                <img src="{{ asset('storage/' . $dish->image) }}" class="card-img-bottom img-fluid p-5 rounded"
                    alt="{{ $dish->name }}">
            </div>
        @else
            <p class="px-3">Non è ancora stata caricata nessuna immagine :(</p>
            <img class="card-img-bottom img-fluid p-5 rounded" src="{{ Vite::asset('resources/img/placeholder.svg') }}"
                alt="Immagine di placeholder">
        @endif
    </div>


    {{-- modal  --}}
    <div id="confirmDeleteModal" class="ms-modal">

        {{-- Modal content --}}
        <div class="ms-modal-content">
            <div class="hstack align-items-center justify-content-between mb-3">
                <div class="hstack align-items-center justify-content-center gap-2">
                    <img src="https://img.icons8.com/ios/40/000000/box-important--v1.png" alt="box-important--v1" />
                    <div class="fs-3">Conferma cancellazione</div>
                </div>
                <div class="ms-close">&times;</div>
            </div>
            <div class="ms-modal-body"></div>
            <div class="hstack justify-content-end gap-2 mt-2">
                <button class="ms-close-btn btn btn-secondary">Annulla</button>
                <button id="modal-confirm" class="btn btn-danger">Elimina</button>
            </div>
        </div>

    </div>
@endsection
