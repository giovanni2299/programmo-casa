@extends('layouts.app')

@section('content')

<section>

    @foreach($sponsorships as $sponsorship)
        <div>
            <ul>
                <li>{{$sponsorship->name}}</li>
                <li>{{$sponsorship->price}}</li>
                <li>{{$sponsorship->duration}}</li>
            </ul>       
        </div>
    @endforeach

</section>

@endsection