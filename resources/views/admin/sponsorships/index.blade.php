@extends('layouts.app')

@section('content')

<section>

    <h3>
        scopri di seguito i nostri abbonamenti e scegli quello più giusto per te in base alla durata della sponsorizzazione ed al suo prezzo. 
    </h3>

    <!-- dico di prendere dalla tabella sponsorships ogni sponsor come dato -->
    @foreach($sponsorships as $sponsorship)
        <div>
            <ul>
                <!-- dico di stampare dentro il list item il nome della sponsorship -->
                <li>{{$sponsorship->name}}</li>
                <!-- dico di stampare dentro il list item il prezzo della sponsorship -->
                <li>{{$sponsorship->price}}€</li>
                <!-- dico di stampare dentro il list item la durata della sponsorship -->
                <li>{{$sponsorship->duration}}</li>

                <!-- aggiungo il modulo per eliminare un abbonamento -->
                <form class="delete-form destroy-form" action="{{ route('admin.sponsorships.destroy',$sponsorship) }}" method="POST">       
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Elimina</button>        
                </form>

                <button class="btn">
                    <a class="btn btn-dark " href="{{route('admin.sponsorships.show', $sponsorship)}}"> Visualizza </a>
                </button>
                
                <button class="btn">
                    <a class="btn btn-dark " href="{{route('admin.sponsorships.edit', $sponsorship)}}"> Modifica </a>
                </button>
            </ul>       
        </div>
    @endforeach

</section>

@endsection