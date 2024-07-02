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

        <a class="btn btn-primary mb-3" href="{{route('admin.apartments.create')}}"> crea un unovo appartamento</a>
        
        {{-- I created a link that passes a paramenter to the controller. ('trash' setted to 1) --}}
        <p><a href="{{ route('admin.apartments.index', ['trash' => 1]) }}">Cestino (n)</a></p>


        <div class="row gx-3 gy-3 text-center">
            @foreach ($apartments as $apartment)
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="img_banner">
                            <img src="{{asset('img/'.$apartment->img_apartment)}}" alt="">
                            <div class="banner">
                                {{$apartment->title_apartment}}
                                <div>
                                    <a href="{{route('admin.apartments.show',$apartment)}}">look apartment</a>
                                </div>
                                <div>
                                    @if($apartment->trashed())
                                        <form class="delete-form destroy-form" action="{{ route ('admin.apartments.forceDestroy',$apartment->id) }}"  method="POST">
                                        
                                            @csrf
                                            @method('DELETE')
                                        
                                            <button class="btn btn-danger my-3">Delete</button>
                                        
                                        </form>
                                    @else
                                        <form class="delete-form destroy-form" action="{{ route ('admin.apartments.destroy',$apartment) }}"  method="POST">
                                        
                                            @csrf
                                            @method('DELETE')
                                        
                                            <button class="btn btn-danger my-3">Delete</button>
                                        
                                        </form>
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