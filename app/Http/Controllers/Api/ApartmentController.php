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
}
