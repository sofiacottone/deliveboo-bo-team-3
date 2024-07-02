<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" class="text-uppercase">nome</th>
            <th scope="col" class="text-uppercase">prezzo</th>
            <th scope="col" class="text-center text-uppercase">visibilità</th>
            <th scope="col" class="text-center text-uppercase">azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dishes as $dish)
            <tr>
                <td>{{ $dish->name }}</td>
                <td>{{ $dish->price }}€</td>
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
