@extends('layouts.app')

@section('content')

  <section class="py-3">
    <div class="container">
      <h1>Utente {{ $user->id }}</h1>
    </div>

    <div class="container">
      <div class="mb-3">
        <h3>Id:</h3>
        <p>{{ $user->id }}</p>
      </div>
      <div class="mb-3">
        <h3>Nome e Cognome:</h3>
        <p>{{ $user->name }}</p>
      </div>
    </div>

    <div class="container">
      <h4>Modifica</h4>
      <div class="mb-3">
        <a href="{{route('admin.users.edit', $user)}}">Modifica</a>
        <a class="ms-3 text-danger" href="#">Cancella</a>
      </div>
    </div>
  </section>

@endsection