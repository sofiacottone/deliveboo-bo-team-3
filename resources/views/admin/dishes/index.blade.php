@extends('layouts.admin')

@section('content')
    <H3 class="text-center">I tuoi Piatti</H3>
    <div class="d-flex">
        <h4>Aggiungi un piatto:</h4>
        <a class="text-body" href="{{ Route('admin.menu.create') }}"><i class="fa-solid fa-plus"></i></a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NOME</th>
                <th scope="col">SLUG</th>
                <th scope="col">PREZZO</th>
                <th scope="col">DESCRIZIONE</th>
                <th scope="col" class="text-center">AZIONI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
                <tr>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->slug }}</td>
                    <td>{{ $dish->price }}</td>
                    <td>{{ $dish->description }}</td>
                    {{-- actions --}}
                    <td class="d-flex justify-content-center align-items-center gap-2">
                        <a class="text-body btn btn-outline-secondary" href="{{ route('admin.menu.show', $dish->id) }}">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>

                        <a href="" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-pencil"></i>
                        </a>

                        <form action="{{ route('admin.menu.destroy', ['menu' => $dish->id]) }}" method="POST">
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
                    <div class="fs-3">Confirm delete</div>
                </div>
                <div class="ms-close">&times;</div>
            </div>
            <div class="ms-modal-body"></div>
            <div class="hstack justify-content-end gap-2">
                <button class="ms-close-btn btn btn-secondary">Cancel</button>
                <button id="modal-confirm" class="btn btn-danger">Delete</button>
            </div>
        </div>

    </div>
@endsection
