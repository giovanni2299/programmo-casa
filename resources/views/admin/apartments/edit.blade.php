@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Aggiungi un appartamento</h1>
    </div>
    <div class="container">
        <form action="{{ route('admin.apartments.update',$apartment) }}" method="POST" >

            {{-- Cross Site Request Forgering --}}
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 flex-grow-1">
                    <div class="mb-3">
                        <div>
                            <label for="title_apartment">Titolo del Appartamento:</label>
                        </div>
                        <input type="text" name="title_apartment" class="form-control" id="title_apartment" placeholder="Inserisci il titolo del Appartamento" value="{{old('name',$apartment->title_apartment)}}">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="rooms">N° di Stanze:</label>
                        </div>
                        <input type="number" name="rooms" class="form-control" id="rooms" placeholder="Inserisci le Stanze Presenti" value="{{old('rooms',$apartment->rooms)}}">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="beds">N° di Letti:</label>
                        </div>
                        <input type="number" name="beds" class="form-control" id="beds" placeholder="Inserisci i Letti Presenti" value="{{old('beds',$apartment->beds)}}">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="bathrooms">N° di Bagni:</label>
                        </div>
                        <input type="number" name="bathrooms" class="form-control" id="bathrooms" placeholder="Inserisci i Bagni Presenti" value="{{old('bathrooms',$apartment->bathrooms)}}">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="sqr_meters">Metri Quadrati:</label>
                        </div>
                        <input type="number" name="sqr_meters" class="form-control" id="sqr_meters" placeholder="Inserisci i Metri Quadrati" value="{{old('sqr_meters',$apartment->sqr_meters)}}">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="img_apartment">Foto del Appartamento:</label>
                        </div>
                        <input type="image" name="img_apartment" class="form-control" id="img_apartment" placeholder="Inserisci foto dell Appartamento" value="{{old('img_apartment',$apartment->img_apartment)}}">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="description">Descrizione dell appartamento:</label>
                        </div>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Inserisci Info Generali" value="{{old('description',$apartment->description)}}">
                    </div>
        
                    <div class="mb-3">
                        <div>
                            <label for="complete_address">Indirizzo Completo:</label>
                        </div>
                        <input type="text" name="complete_address" class="form-control" id="complete_address" placeholder="Inserisci L'indirizzo" value="{{old('complete_address',$apartment->complete_address)}}">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="service_container">
                        <h4>Quali Servizi Disponibili</h4>
                        @foreach ($services as $service)
                            <div class="form-check">
                                <input class="form-check-input" @checked(in_array($service->id, old('services', $apartment->services->pluck('id')->all() ))) type="checkbox" name='service[]' id="service-{{ $service->id }}" value="{{ $service->id }}">
                                <label class="form-check-lable" for="weapon-{{ $service->id }}">
                                {{ $service->name }}
                                </label>

                            </div>
                        @endforeach
                    </div>
    
                </div>

            </div>
           
           
            <button class="btn btn-primary">modifica appartamento</button>
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