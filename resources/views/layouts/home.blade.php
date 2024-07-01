@extends('layouts.app')

@section('content')
    <h3 class="text-center mt-4">Sei un ristoratore?</h3>
    <div class="container my-4">
        <div class="d-flex justify-content-center gap-3">
            <div class="card h-100 w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <div class="card-text my-3 text-center">Clicca qui per effettuare il login.</div>
                    @guest
                        <div class="d-flex justify-content-center">
                            <div class="ms-btn-custom">
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>

            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">Registrati</h5>
                    <div class="card-text my-3 text-center">Clicca qui per registrarti.</div>
                    @guest
                        <div class="d-flex justify-content-center">
                            @if (Route::has('register'))
                                <div class="ms-btn-custom">
                                    <a href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </div>
                            @endif
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
@endsection
