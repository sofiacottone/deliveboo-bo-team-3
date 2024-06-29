@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifica il tuo piatto!') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.menu.update', ['menu' => $dish->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome del Piatto') }} *</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"  name="name"
                                        value="{{ old('name', $dish->name) }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Prezzo') }} *</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" min="1" step=".1"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price', $dish->price) }}" autocomplete="price" autofocus>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" name="image"
                                        autocomplete="image" autofocus>
                                    <!-- Errore caricamento immagine -->
                                    @error('image')
                                        {{-- <span class="invalid-feedback" role="alert"> --}}
                                            <strong class="alert alert-danger">{{ $message }}</strong>
                                        {{-- </span> --}}
                                    @enderror
                                    <!-- Se l'immagine è stata già caricata viene visualizzata altrimenti viene visualizzato un messaggio -->
                                    <div class="my-4">
                                        @if ($dish->image)
                                            <div>
                                                <img style="width: 300px;" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                                            </div>
                                        @else 
                                            <p>Non è ancora stata caricata nessuna immagine</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                <div class="mb-4 row">
                                    <label for="visibiility"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Disponibile') }}</label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visibility" id="visibility_yes" value="1" {{ old('visibility', $dish->visibility) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="visibility_yes">
                                                Sì
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visibility" id="visibility_no" value="0" {{ old('visibility', $dish->visibility) == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="visibility_no">
                                                No
                                            </label>
                                        </div>
                                        @error('visibiility')
                                            {{-- <span class="invalid-feedback" role="alert"> --}}
                                                <strong class="alert alert-danger">{{ $message }}</strong>
                                            {{-- </span> --}}
                                        @enderror
                                    </div>
                                </div>
                            <div class="mb-4 row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>
        
                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" rows="10" name="description">{{ old('description', $dish->description) }}</textarea>
                                </div>
                                <div class="mt-4">
                                    @error('description')
                                        <span role="alert">
                                            <strong class="alert alert-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Conferma') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
