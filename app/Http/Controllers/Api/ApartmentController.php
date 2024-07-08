<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

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
        $apartments = Apartment::where('complete_address', 'like', '%'.$zone.'%')->get();
        
        return response()->json($apartments);
    }
}
