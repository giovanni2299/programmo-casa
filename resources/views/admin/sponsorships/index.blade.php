@extends('layouts.app')

@section('content')

<section>

    <!-- dico di prendere dalla tabella sponsorships ogni sponsor come dato -->
    @foreach($sponsorships as $sponsorship)
        <div>
            <ul>
                <!-- dico di stampare dentro il list item il nome della sponsorship -->
                <li>{{$sponsorship->name}}</li>
                <!-- dico di stampare dentro il list item il prezzo della sponsorship -->
                <li>{{$sponsorship->price}}</li>
                <!-- dico di stampare dentro il list item la durata della sponsorship -->
                <li>{{$sponsorship->duration}}</li>
            </ul>       
        </div>
    @endforeach

</section>

@endsection