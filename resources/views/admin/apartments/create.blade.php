@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Aggiungi un appartamento</h1>
    </div>
    <div class="container">
        <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data" >

            {{-- Cross Site Request Forgering --}}
            @csrf

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 flex-grow-1">
                    <div class="mb-3">
                        <div>
                            <label for="title_apartment">Titolo del Appartamento:</label>
                        </div>
                        <input type="text" name="title_apartment" class="form-control" id="title_apartment" placeholder="Inserisci il titolo del Appartamento">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="rooms">N° di Stanze:</label>
                        </div>
                        <input type="number" name="rooms" class="form-control" id="rooms" placeholder="Inserisci le Stanze Presenti">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="beds">N° di Letti:</label>
                        </div>
                        <input type="number" name="beds" class="form-control" id="beds" placeholder="Inserisci i Letti Presenti">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="bathrooms">N° di Bagni:</label>
                        </div>
                        <input type="number" name="bathrooms" class="form-control" id="bathrooms" placeholder="Inserisci i Bagni Presenti">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="sqr_meters">Metri Quadrati:</label>
                        </div>
                        <input type="number" name="sqr_meters" class="form-control" id="sqr_meters" placeholder="Inserisci i Metri Quadrati">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="img_apartment" class="form-label">Foto dell' Appartamento</label>
                        </div>
                        <input class="form-control" type="file" id="img_apartment" name="img_apartment">
                      </div>
                      
        
                    <div class="mb-3">
                        <div>
                            <label for="description">Descrizione dell appartamento:</label>
                        </div>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Inserisci Info Generali">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="complete_address">Indirizzo Completo:</label>
                        </div>
                        <input type="text" name="complete_address" class="form-control" id="complete_address" placeholder="Inserisci L'indirizzo">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Via</label>
                    <input type="text" class="form-control my-input-address" id="address" name="address" required>
                    <div class="invalid-feedback">
                        Per favore inserisci una città valida.
                    </div>
                    <table>
                        <tbody class="my-table-suggestions">
                            
                        </tbody>
                    </table>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="service_container">
                        <h4>Quali Servizi Disponibili</h4>
                            <div class="accordion-body">
                              @foreach ($services as $service)
                                <div class="form-check">
                                  <input @checked(in_array($service->id, old('services', []))) type="checkbox" name='services[]' id='service-{{ $service->id }}' value='{{ $service->id }}'>
                                  <label for="weapon-{{ $service->id }}">
                                    {{ $service->name }}
                                  </label>
                                </div>
                              @endforeach
                            </div>
                    </div>
    
                </div>

            </div>
           
           
            <button class="btn btn-primary">crea appartamento</button>
        </form>

        @if ($errors->any())
        <p class="">
        <ul>
          @foreach ($errors->all() as $error )
          <li class="alert alert-danger">{{ $error }}</li>
          @endforeach
        </ul>
        </p>
        @endif

    </div>
@endsection