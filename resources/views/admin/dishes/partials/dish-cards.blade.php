<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 gx-4 gy-4">
        @foreach ($dishes as $dish)
            <div class="col">
                <div class="card h-100 mb-3 border-dark">
                    <div class="card-body">
                        <div class="ms-img-container {{ $dish->visibility == 0 ? 'disabled' : '' }}">
                            <img class="card-img-top mb-1 ms-img" src="{{ asset('storage/' . $dish->image) }}" alt="Card image cap">
                        <h5 class="card-title">{{ $dish->name }}</h5>
                        <h6 class="card-title"><i class="fa-solid fa-euro-sign mb-1"></i> {{ $dish->price }}</h6>
                        <h6 class="card-title">Visibile nel menù:
                            @if ($dish->visibility == 1)
                                <i class="fa-solid fa-eye"></i>
                            @else
                                <i class="fa-solid fa-eye-slash"></i>
                            @endif
                        </h6>
                        </div>
                        <hr class="mb-3">
                        <div class="d-flex justify-content-center flex-wrap flex-lg-nowrap">
                            <a class="text-body btn btn-outline-primary btn-sm"
                                href="{{ route('admin.menu.show', $dish->slug) }}">
                                Mostra
                            </a>
                            <a href="{{ route('admin.menu.edit', $dish->slug) }}"
                                class="btn btn-outline-secondary mx-2 btn-sm">
                                Modifica
                            </a>
                            <form action="{{ route('admin.menu.destroy', ['dish' => $dish->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-dish-name="{{ $dish->name }}"
                                    class="js-delete-btn btn btn-outline-danger btn-sm">
                                    Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>