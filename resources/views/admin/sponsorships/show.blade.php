@extends('layouts.app')

@section('content')

<section>
    <div>
        <p>
            il nostro abbonamento comprende una sponsorizzazione di {{$sponsorship->duration}} ore ad un costo di {{$sponsorship->price}}€
        </p>

        <!-- dico di stampare il nome di una sponsorship indicata -->
        {{$sponsorship->name}}
        <!-- dico di stampare il prezzo di una sponsorship indicata -->
        {{$sponsorship->price}}€
        <!-- dico di stampare la durata di una sponsorship indicata -->
        {{$sponsorship->duration}}     
        
        <!-- aggiungo il modulo per eliminare un abbonamento -->
        <form class="delete-form" action="{{ route('admin.sponsorships.destroy',$sponsorship) }}" method="POST">       
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Elimina</button>        
        </form>
    </div>
</section>

@endsection