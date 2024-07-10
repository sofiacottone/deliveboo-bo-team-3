@extends('layouts.admin')

@section('content')
    <div class="card mb-3 m-4 p-3">
        <div class="d-flex justify-content-end mb-2">
            <a class="text-body btn btn-outline-secondary" href="{{ route('admin.orders.show', $order->id) }}">
                Torna all'ordine
            </a>
        </div>
        <div class="hstack justify-content-between py-2">
            <div class="card-text"><strong>Ordine numero: </strong>{{ $order->id }}</div>
            <div class="card-text"><strong>Data: </strong>{{ $order->created_at->format('d/m/Y G:H:s') }}</div>
        </div>
        <h2>Comanda</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-uppercase">piatto</th>
                    <th scope="col" class="text-uppercase text-center">quantità</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td class="text-center">{{ $dish->pivot->quantity }}x</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
