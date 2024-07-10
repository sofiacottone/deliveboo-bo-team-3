@extends('layouts.admin')

@section('content')
    <div class="card mb-3 m-5">
        <div class="card-body">
            <h5 class="mt-3">Dati ordine</h5>
            <div class="hstack justify-content-between">
                <div class="card-text"><strong>Ordine numero: </strong>{{ $order->id }}</div>
                <div class="card-text"><strong>Data: </strong>{{ $order->created_at->format('d/m/Y G:H:s') }}</div>
            </div>
            <div class="card-text"><strong>Prezzo totale: </strong>{{ $order->price }}€</div>

            <h5 class="mt-3">Dati cliente</h5>
            <div class="card-text"><strong>Nome cliente: </strong>{{ $order->full_name }}</div>
            <div class="card-text"><strong>Indirizzo: </strong>{{ $order->address }}</div>
            <div class="card-text"><strong>Telefono: </strong>{{ $order->phone_number }}</div>
            <div class="card-text"><strong>Email: </strong>{{ $order->email }}</div>

            <h5 class="mt-3">Comanda</h5>
            <a href="{{ route('admin.orders.details', $order->id) }}" class="btn btn-outline-secondary">
                Vai alla comanda
            </a>
        </div>

    </div>
@endsection
