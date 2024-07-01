@extends('layouts.app')

@section('content')
  <section>
    <div class="container p-5">
      <div class="row justify-content-end">
        <div class="col-auto ">
          <a class="btn btn-outline-dark" href="">AGGIUNGI UN NUOVO SERVIZIO</a>
        </div>
      </div>
    </div>
    <div class="container p-2">
      <div class="row">
        @foreach ($services as $service)
          <div class="col-2 p-2">
            <div class="card p-2">
              <div class="card-text">
                <a href="{{ route('admin.services.show', $service) }}">
                  {{ $service->name }}
                </a>
              </div>
              <div class="card-btn">
                <a class="btn btn-secondary text-white" href="">MODIFICA</a>
                <a class="btn btn-danger" href="">ELIMINA</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection