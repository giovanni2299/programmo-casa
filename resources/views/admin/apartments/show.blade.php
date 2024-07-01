@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 6">
            <h1>
                {{$apartment->title_apartment}}
            </h1>
        </div>

        <div class="col 6">
            
        </div>

    </div>
    <div class="container">
        <div class="row justify-content-center">
            <img src="{{asset('img/'.$apartment->img_apartment)}}" alt="">
        </div>
        <div class="description_container mb-3 p-3">
            <div class="mb-2">

                {{$apartment->description}}
            </div>
            <div>
                <h5>
                    N° Stanze:

                </h5>
                <p>

                    {{$apartment->rooms}}
                </p>

            </div>
            <div>
                <h5>

                    N° Letti:
                </h5>
                <p>

                    {{$apartment->beds}}
                </p>
            </div>
            <div>
                <h5>
                    N° bagni:

                </h5>
                <p>

                    {{$apartment->bathrooms}}
                </p>

            </div>

            <div>
                <h5>
                    M²:

                </h5>
                <p>

                    {{$apartment->sqr_meters}}
                </p>

            </div>
            


        </div>

        <div class="services_container mb-3">
            qui andranno i servizi
        </div>

        <div class="mb-3">
            <h3>
                Dove Soggiornerai
            </h3>
            <img src="{{asset('img/'.$apartment->img_apartment)}}" alt="">
        
        </div>

        <div class="container reviews mb-3">
            <div class="row">
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
                <div class="col-4">
                    ciao
                </div>
            </div>
        </div>

        <div class="other_apartments">
            qui ci sarà il carosello con le case correlate alla ricerca
        </div>
    </div>
</div>
@endsection