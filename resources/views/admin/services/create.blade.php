@extends('layouts.app')

@section('content')
  <section>
    <div class="container">
      <h1>Aggiungi un nuovo servizio</h1>
    </div>
    <div class="container">
      <form action="{{ route('admin.services.store') }}" method="POST">
        {{-- Cross Site Request Forgering --}}
        @csrf
        
        <div class="mb-3">
          <label for="title" class="form-label">Nome servizio</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="Inserisci il nome del servizio">
        </div>

        <div class="mb-3">
          <label for="floatingTextarea" class="form-label">Descrizione</label>
          <textarea class="form-control" id="floatingTextarea" placeholder="Descrivi il nuovo servizio"></textarea>
        </div>

        <button class="btn btn-dark">Aggiungi il servizio</button>
      </form>
    </div>
  </section>
@endsection