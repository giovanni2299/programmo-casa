@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Programmo Casa</h1>
    
    <div class="container mb-5">
        <div class="slider">
            qui ci va lo slider
        </div>
    </div>
</div>
    <div class="container">

        @if (request('trash'))
            <h2 class="text-start my-4">Appartamenti eliminati</h2>
            <p><a href="{{ route('admin.apartments.index') }}">Torna agli appartamenti</a></p>
            

        @else
            <h2 class="text-start my-4">Appartamenti creati</h2>
            <a class="btn btn-primary mb-3" href="{{route('admin.apartments.create')}}"> Crea un nuovo appartamento</a>
            <p><a class="btn btn-danger" href="{{ route('admin.apartments.index', ['trash' => 1]) }}">Cestino (n)</a></p>
        @endif

        <div class="row gx-3 gy-3 text-center">
            @foreach ($apartments as $apartment)
            <div class="col-12 col-lg-6 position-relative ">
                <div class="card my-card-apartment h-100">
                    <div class="card-body">
                        <div class="img_banner">
                            <img src="{{asset('storage/'.$apartment->img_apartment)}}" alt="">
                            <div class="banner">
                                <h3>
                                    {{$apartment->title_apartment}}

                                </h3>
                                <div class="mt-3">
                                    <a class="btn btn-primary" href="{{route('admin.apartments.show',$apartment)}}">Info Appartamento</a>
                                </div>
                                <div>
                                    {{-- it allows the creation of a button if the apartment is been soft deleted --}}
                                    @if ($apartment->user_id === Auth::id())
                                    @if($apartment->trashed())
                                    {{-- it sent the apartment id to the Apartment Controller through the route --}}
                                    <form class="delete-form destroy-form" action="{{ route ('admin.apartments.forceDestroy',$apartment->id) }}"  method="POST">
                                    
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button class="btn btn-danger my-3">Elimina definitivamente</button>
                                    
                                    </form>

                                    <form class="delete-form" action="{{ route ('admin.apartments.restore',$apartment->id) }}"  method="POST">
                                    
                                        @csrf
                                    
                                        <button class="btn btn-warning my-3">Ripristina</button>
                                    
                                    </form>


                                {{-- it creates a button for the soft deleting method --}}
                                @else
                                    <form class="delete-form destroy-form" action="{{ route ('admin.apartments.destroy',$apartment) }}"  method="POST">
                                    
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button class="btn btn-danger my-3">Elimina</button>
                                    
                                    </form>
                                    <div class="d-none modal-delete position-absolute top-50 start-50 translate-middle bg-body rounded p-3" >
                                        <h5>Sei sicuro di voler eliminare?</h5>
                                        <button class="btn-yes btn btn-outline-dark">si</button>
                                        <button class="btn-no btn btn-outline-dark">no</button>
                                    </div>
                                    @endif
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            @endforeach
        </div>
    

</div>
@endsection