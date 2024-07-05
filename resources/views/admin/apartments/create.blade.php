@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Aggiungi un appartamento</h1>
    </div>
    <div class="container">
        <form class="form-create-apartment" action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data" >

            {{-- Cross Site Request Forgering --}}
            @csrf

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 flex-grow-1">
                    <div class="mb-3">
                        <div>
                            <label for="title_apartment">Titolo del Appartamento:</label>
                            <input type="text" name="title_apartment" class="form-control" id="title_apartment" placeholder="Inserisci il titolo del Appartamento" value="{{ old('title_apartment') }}" required>  
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="rooms">N° di Stanze:</label>
                            <input type="number" name="rooms" class="form-control" id="rooms" min="2" placeholder="Inserisci le Stanze Presenti" value="{{ old('rooms') }}">
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="beds">N° di Camere da Letto:</label>
                            <input type="number" name="beds" class="form-control" id="beds" min="1" placeholder="Inserisci i Letti Presenti" value="{{ old('beds') }}">
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="bathrooms">N° di Bagni:</label>
                            <input type="number" name="bathrooms" class="form-control" id="bathrooms" min="1" placeholder="Inserisci i Bagni Presenti" value="{{ old('bathrooms') }}">
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="sqr_meters">Metri Quadrati:</label>
                            <input type="number" name="sqr_meters" class="form-control" id="sqr_meters" min="15" placeholder="Inserisci i Metri Quadrati" value="{{ old('sqr_meters') }}">
                        </div>
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="img_apartment" class="form-label">Foto dell' Appartamento</label>
                            <input type="file" class="form-control" id="img_apartment" name="img_apartment">
                        </div>
                      </div>
                      
        
                    <div class="mb-3">
                        <div>
                            <label for="description">Descrizione dell appartamento:</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Inserisci Info Generali" value="{{ old('description') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="complete_address" class="form-label">Indirizzo Completo</label>
                        <input type="text" class="form-control my-input-address" id="complete_address" name="complete_address" value="{{ old('complete_address') }}" required>
                        <div class="invalid-feedback">
                            Per favore inserisci una città valida.
                        </div>
                        <table>
                            <tbody class="my-table-suggestions">
                                
                            </tbody>
                        </table>
                    </div>

                    <input class="latitude" type="hidden" value="0" name="latitude">
                    <input class="longitude" type="hidden" value="0" name="longitude">

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
           
           
            <button class="btn btn-primary">Crea appartamento</button>
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