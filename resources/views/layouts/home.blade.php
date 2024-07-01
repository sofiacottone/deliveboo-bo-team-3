@extends('layouts.app')

@section('content')
    @guest
        <h3 class="text-center mt-4">Sei un ristoratore?</h3>
        <div class="container my-4">
            <div class="d-flex justify-content-center gap-3">
                <div class="card h-100 w-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <div class="card-text my-3 text-center">Clicca qui per effettuare il login.</div>
                        <div class="d-flex justify-content-center">
                            <div class="ms-btn-custom">
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registrati</h5>
                        <div class="card-text my-3 text-center">Clicca qui per registrarti.</div>

                        <div class="d-flex justify-content-center">
                            @if (Route::has('register'))
                                <div class="ms-btn-custom">
                                    <a href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h3 class="text-center mt-4">Vuoi uscire?</h3>
        <div class="container my-4">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">Logout</h5>
                    <div class="card-text my-3 text-center">Clicca qui per effettuare il logout.</div>
                    <div class="d-flex justify-content-center">
                        <div class="ms-btn-custom">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    @endsection
