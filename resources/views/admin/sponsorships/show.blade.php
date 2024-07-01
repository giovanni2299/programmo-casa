@extends('layouts.app')

@section('content')

<section>
    <div>
        <!-- dico di stampare il nome di una sponsorship indicata -->
        {{$sponsorship->name}}
        <!-- dico di stampare il prezzo di una sponsorship indicata -->
        {{$sponsorship->price}}
        <!-- dico di stampare la durata di una sponsorship indicata -->
        {{$sponsorship->duration}}         
    </div>
</section>

@endsection