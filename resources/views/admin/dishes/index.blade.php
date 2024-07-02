@extends('layouts.admin')

@section('content')
    <div class="hstack justify-content-end align-items-center mt-2">
        <i class="fa-solid fa-table-list border p-2 rounded"></i>
        <i class="fa-solid fa-grip border p-2 rounded"></i>
    </div>

    <h3 class="text-center">I tuoi Piatti</h3>
    <div class="hstack justify-content-end align-items-center gap-2">
        <h5>Aggiungi un piatto</h5>
        <a class="text-body btn btn-outline-success mb-2" href="{{ Route('admin.menu.create') }}"><i
                class="fa-solid fa-plus"></i></a>
    </div>

    {{-- table  --}}
    <div id="table" class="d-none">
        @include('admin.dishes.partials.dish-table')
    </div>
    {{-- cards  --}}
    <div id="cards">
        @include('admin.dishes.partials.dish-cards')
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
