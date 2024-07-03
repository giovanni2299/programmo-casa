<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{
    //
    public function index(){
        $apartments = Apartment::all();

        return view('admin.apartments.index', compact('apartments'));
    }

    public function create(){
        $services = Service::all();

        return view('admin.apartments.create', compact('services'));
    }

    public function store(Request $request){
        $form_data = $request->all();

        // $address =  $request->city;
        // // $address = 'Via Giovanni Pascoli'; 

        // $response = Http::get('https://api.tomtom.com/search/2/search/'.$address.'.json?key=SmzJJ1e9vacLwiqfqgxPWAvQ7Ey33PfG')->json();

        // $suggestions = [];
        // $street_name = [];
        // $municipality = [];

        // for($i = 0; $i < count($response['results']); $i++ ){
            
        //     $suggestions[$i] = $response['results'][$i]['address'];
        // }

        // @dump($suggestions);
        
        // for($x = 0; $x < count($suggestions); $x++ ){
            
        //     if(array_key_exists('municipality', $suggestions[$x])){
        //         $municipality[] = $suggestions[$x]['municipality'];
        //         // $street_name[] = $suggestions[$x]['streetName'].$municipality[$x];
        //     }else{
        //         // $street_name[] = $suggestions[$x]['streetName'];
        //     }
        // }

        // @dd($street_name);
        // @dd($municipality);
        // @dd($response['results']);

        $new_apartment = Apartment::create($form_data);

        if($request->has('services')){
            $new_apartment->services()->attach($request->services);
        }

        return to_route('admin.apartments.show', $new_apartment);
    }

    public function show(Apartment $apartment){

        $apartment->load(['services', 'services.apartments']);

        return view('admin.apartments.show', compact('apartment'));
    }

    public function edit(Apartment $apartment){

        $services = Service::orderBy('name', 'asc')->get();
        
        return view('admin.apartments.edit', compact('apartment','services'));
    }

    public function update(Request $request, Apartment $apartment){
        $form_data = $request->all();

        $apartment->upadte($form_data);

        return to_route('admin.apartments.show', $apartment);
    }

    public function destroy(Apartment $apartment){
        $apartment->delete();
        return to_route('admin.apartments.index');
    }
}
