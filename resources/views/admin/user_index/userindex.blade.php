@extends('layouts.app')

@section('content')
    <h1>I tuoi appartamenti</h1>
    <div class="container">
        <div class="row">
            @foreach ($apartments as $apartment)
            <div class="col-12 col-md-6 col-lg-3">
               @if ($apartment->user_id === Auth::id())
                    {{-- <img src="{{asset('storage/'.$apartment->img_apartment)}}" alt=""> --}}

                    {{$apartment->title_apartment}}
               @endif
            </div>
                
            @endforeach
        </div>
        
    </div>
@endsection