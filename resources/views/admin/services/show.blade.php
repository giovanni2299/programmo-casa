@extends('layouts.app')

@section('content')
  <section>
    <div class="container py-5">
      <div class="row">
        <div class="col-auto">
          <div class="card p-2">
            {{ $service->name }}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection