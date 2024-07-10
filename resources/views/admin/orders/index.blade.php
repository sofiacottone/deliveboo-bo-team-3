@extends('layouts.admin')

@section('content')
    <h3 class="text-center py-3">I tuoi Ordini</h3>

    {{-- orders  --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-uppercase">nome</th>
                <th scope="col" class="text-uppercase">prezzo</th>
                <th scope="col" class="text-uppercase">indirizzo</th>
                <th scope="col" class="text-uppercase">telefono</th>
                <th scope="col" class="text-uppercase">email</th>
                <th scope="col" class="text-uppercase">data</th>
                <th scope="col" class="text-center text-uppercase">azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->full_name }}</td>
                    <td>{{ $order->price }}€</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->created_at->format('d/m/Y h:i:s a') }}</td>

                    {{-- actions --}}
                    <td class="d-flex justify-content-center align-items-center gap-2">
                        <a class="text-body btn btn-outline-secondary" href="{{ route('admin.orders.show', $order->id) }}">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="text-body btn btn-outline-secondary"
                            href="{{ route('admin.orders.details', $order->id) }}">
                            <i class="fa-solid fa-receipt fa-fw"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
