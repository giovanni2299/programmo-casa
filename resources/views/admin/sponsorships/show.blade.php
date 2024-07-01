@extends('layouts.app')

@section('content')

<section>
    <div>
        {{$sponsorship->name}}
        {{$sponsorship->price}}
        {{$sponsorship->duration}}         
    </div>
</section>

@endsection