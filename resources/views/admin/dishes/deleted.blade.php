@extends('layouts.admin')

@section('content')
    <h3 class="text-center">Piatti eliminati dal menu</h3>

    @if (count($dishes) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NOME</th>
                    <th scope="col">PREZZO</th>
                    <th scope="col">DESCRIZIONE</th>
                    <th scope="col" class="text-center">AZIONI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->price }}</td>
                        <td>{{ $dish->description }}</td>
                        {{-- actions --}}
                        <td class="d-flex justify-content-center align-items-center gap-2">
                            {{-- restore  --}}
                            <a href="{{ route('admin.menu.restore', ['dish' => $dish->id]) }}"
                                class="btn btn-outline-secondary">
                                <i class="fa-solid fa-trash-can-arrow-up"></i>
                            </a>

                            {{-- <form action="{{ route('admin.menu.destroy', ['menu' => $dish->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-dish-name="{{ $dish->name }}"
                                    class="js-delete-btn btn btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="mt-3 ms-2">Nessun piatto cancellato.</div>
    @endif

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
