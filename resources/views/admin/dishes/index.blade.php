@extends('layouts.admin')

@section('content')
    <h3 class="text-center">I tuoi Piatti</h3>
    <div class="hstack justify-content-end align-items-center gap-2">
        <h5>Aggiungi un piatto</h5>
        <a class="text-body btn btn-outline-success mb-2" href="{{ Route('admin.menu.create') }}"><i
                class="fa-solid fa-plus"></i></a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-uppercase">nome</th>
                <th scope="col" class="text-uppercase">prezzo</th>
                <th scope="col" class="text-uppercase">descrizione</th>
                <th scope="col" class="text-center text-uppercase">visibilità</th>
                <th scope="col" class="text-center text-uppercase">azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
                <tr>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->price }}€</td>
                    <td>{{ $dish->description }}</td>
                    @if ($dish->visibility == 1)
                        <td class="text-center">Sì</td>
                    @else
                        <td class="text-center">No</td>
                    @endif

                    {{-- actions --}}
                    <td class="d-flex justify-content-center align-items-center gap-2">
                        <a class="text-body btn btn-outline-secondary" href="{{ route('admin.menu.show', $dish->slug) }}">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>

                        <a href="{{ route('admin.menu.edit', $dish->slug) }}" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-pencil"></i>
                        </a>

                        <form action="{{ route('admin.menu.destroy', ['dish' => $dish->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-dish-name="{{ $dish->name }}"
                                class="js-delete-btn btn btn-outline-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
