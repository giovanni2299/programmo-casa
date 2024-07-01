@extends('layouts.app')

@section('content')

<section class="content">
  <div class="container">
    <h1>Utenti</h1>

    <a href="{{ route('admin.users.create') }}" title="Vai alla pagina di creazione di un nuovo utente">Nuovo</a>
  </div>

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th></th>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Modifica</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td><a href="{{ route('admin.users.show', $user) }}">Mostra</a></td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>

            {{-- <td><a href="{{ route('admin.users.edit') }}" title="Vai alla pagina di modifica utente">Modifica</a></td> --}}
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>

@endsection