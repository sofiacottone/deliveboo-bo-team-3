@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Aggiungi il tuo piatto!') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.menu.store') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome del Piatto') }}
                                    <span style="color: red;">*</span>
                                </label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required minlength="5" maxlength="255"
                                        autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Prezzo') }}
                                    <span style="color: red;">*</span>
                                </label>

                                <div class="col-md-6">
                                    <input id="price" type="number" min="1" step=".1" max="999"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price') }}" required autocomplete="price" autofocus>

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

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Disponibile') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input  class="form-check-input" type="radio" name="visibility"
                                            id="visibility" checked value="1">
                                        <label class="form-check-label" for="visibility">
                                            Sì
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="visibility"
                                            id="visibility2" value="0">
                                        <label class="form-check-label" for="visibility2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>


                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control" rows="10" name="description" minlength="10"
                                        maxlength="5000">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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
