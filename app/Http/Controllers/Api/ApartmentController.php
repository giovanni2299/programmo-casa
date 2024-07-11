<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{
    public function index(){
        $apartments = Apartment::with('user','sponsorships', 'services', 'views', 'messages')->paginate(15);

        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }

    public function show(Apartment $apartment){

        $apartment->load('services');

        return response()->json([
            'apartment' => $apartment
        ]);
    }

    public function search(Request $request){
        // $zone = $request->input('zone');
        $min_lat = $request->input('min_lat');
        $max_lat = $request->input('max_lat');
        $min_lon = $request->input('min_lon');
        $max_lon = $request->input('max_lon');

        $apartments = DB::table('apartments')
                        ->where( 'latitude', '>', $min_lat) 
                        ->where('latitude', '<', $max_lat)
                        ->where('longitude', '<', $max_lon )
                        ->where('longitude', '>', $min_lon )
                        ->get();
        
        return response()->json($apartments);
    }

    public function advancedSearch(Request $request){

        $jsonArray = json_decode($request,true);
        $content = json_decode($request->getContent(), true);


        $min_lat = $content['min_lat'];
        // dd($min_lat);
        $max_lat = $content['max_lat'];
        $min_lon = $content['min_lon'];
        $max_lon = $content['max_lon'];
        $serviceArray = $content['activeFilters'];

        // $apartments = DB::table('apartments')->select('apartments.*')
        // ->join('apartment_service', 'apartment_id', '=', 'apartments.id')
        // ->join('apartment_service', 'service_id', '=', 'services.id')
        // ->where( 'latitude', '>', $min_lat ) 
        // ->where('latitude', '<', $max_lat )
        // ->where('longitude', '<', $max_lon )
        // ->where('longitude', '>', $min_lon )
        // ->whereIn('service.name', 'wi-fi')->groupBy('apartment_id')->get();
        $serviceIds = $request->input('service_ids');

        // Recupera gli appartamenti che possiedono i servizi specificati
        // $apartments = Apartment::whereHas('services', function($query) use ($serviceArray) {
        //     $query->whereIn('id', $serviceArray);
        // })->count($serviceIds)->get();

        // $apartments = DB::table('apartments')
        // ->join('services', 'apartment_service.service_id', '=', 'service.id')
        // ->join('apartment', 'apartment_service.apartment_id', '=', 'apartment.id')
        // ->select('apartment.*', 'services.*')->get();

        // $apartments = Apartment::with('services')
        // ->get();
        //--------------------------------------------

        $servizio = ["pasta scotta", "wi-fi", "animali"];

        $apartments = Apartment::where( 'latitude', '>', $min_lat ) 
        ->where('latitude', '<', $max_lat )
        ->where('longitude', '<', $max_lon )
        ->where('longitude', '>', $min_lon )
        ->whereHas('services', function ($query) use ($serviceArray) {
            $query->whereIn('id', $serviceArray);
        }, '=', count($serviceArray))->get();

        

        //--------------------------------------------


        // $result = Pool::join('Contribution', 'Pool.id', '=', 'Contribution.pool_id')
        // ->join('Contributer', 'Contribution.contributer_id', '=', 'Contributer.id')->get();

        // dd($apartments);

        return response()->json([
            'success' => true,
            'response' => $apartments
        ]);
    }
}
