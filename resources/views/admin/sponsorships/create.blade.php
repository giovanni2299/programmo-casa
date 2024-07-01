@extends('layouts.app')

@section('content')

<section>
    <!-- dico di puntare alla rotta per salvare i dati (store) e il metodo -->
    <form action="{{route('admin.sponsorships.store')}}" method="POST">

        <!-- aggiungo un tooken di sicurezza per l'invio dei dati -->
        @csrf
        <input name="nome" type="text"> inserisci nome del servizio
        <input name="prezzo" type="number"> inserisci costo abbonamento
        <input name="durata" type="number"> inserisci durata abbonamento

        <button>
            invia dati
        </button>
    </form>
</section>

@endsection