@extends('layouts.app')


@section('content')

<section>
  <div class="container">
    <h1>Modifica Utente</h1>
  </div>
  <div class="container">
    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Nome e Cognome</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="inserisci il tuo Nome e Cognome" value="{{ old('name'), $user->name }}">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="inserisci la tua Email" value="{{ old('email', $user->email) }}">
      </div>

      <div class="mb-3">
        <h3>Password</h3>
        <p class="text-danger">Non è possibile modificare la password per motivi di sicurezza.</p>
        <p>Se vuoi modificare la password vai al <a href="{{ route('password.request') }}">recupero password</a>.</p>
      </div>

      <button class="btn btn-primary">Salva</button>



    </form>

    @if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
  </div>
</section>

@endsection