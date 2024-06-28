@extends('layouts.admin')

@section('content')
<H3 class="text-center">I tuoi Piatti</H3>
<div class="d-flex">
    <h4>Aggiungi un piatto:</h4>
    <a class="text-body" href="{{Route('admin.menu.create')}}"><i class="fa-solid fa-plus"></i></a>
</div>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">NOME</th>
        <th scope="col">SLUG</th>
        <th scope="col">PREZZO</th>
        <th scope="col">DESCRIZIONE</th>
        <th scope="col">AZIONI</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($dishes as $dish)
        <tr>
            <td>{{$dish->name}}</td>
            <td>{{$dish->slug}}</td>
            <td>{{$dish->price}}</td>
            <td>{{$dish->description}}</td>
            <td>
                <a class="text-body" href="{{ route('admin.menu.show', $dish->id) }}"><i class="fa-solid fa-info"></i></a>
                <i class="fa-solid fa-pen-to-square"></i>
                <i class="fa-solid fa-trash"></i>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
