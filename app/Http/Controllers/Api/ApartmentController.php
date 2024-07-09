<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
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

    public function search(Request $request){
        $zone = $request->input('zone');
        // $min_lat = $request->input('min_lat');
        // $max_lat = $request->input('max_lat');
        // $min_lon = $request->input('min_lon');
        // $max_lon = $request->input('max_lon');

        // $response = Http::get('https://api.tomtom.com/search/2/geocode/'.$zone.'.json?storeResult=false&countrySet=ITA&lat=41.9027835&lon=12.4963655&view=Unified&key=SmzJJ1e9vacLwiqfqgxPWAvQ7Ey33PfG')->json();
        // // '.$zone.'
        // $lat = $response['results'][0]['position']['lat'];
        // $lon = $response['results'][0]['position']['lat'];

        $apartments = Apartment::where('complete_address', 'like', '%'.$zone.'%')->get();
        // $apartments = Apartment::whereBetween('latitude', [$max_lat, $min_lat] )->get();
        
        return response()->json($apartments);
    }
}
