<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $request->validate([
            'title_apartment'=>'required|max:250|string',
            'rooms'=>'required|min:2|numeric',
            'beds'=>'required|min:1|numeric',
            'bathrooms'=>'required|min:1|numeric',
            'sqr_meters'=>'required|min:70|numeric',
            // validate the request for the file
            // 'file'=>'required|file|mimes:jpg,png|max:2048',
            'description'=>'nullable|string',
            
        ]);

        
        $form_data = $request->all();

        
        $form_data['user_id'] = Auth::id();
       

        if($request->hasFile('img_apartment')){

            $image_path = Storage::disk('public')->put('img_apartment', $request->img_apartment);
            $form_data['img_apartment'] = $image_path;

        }

        $new_apartment = Apartment::create($form_data);


        if($request->has('services')){
            $new_apartment->services()->attach($request->services);
        }

        // if($request->hasFile('img_apartment')){
        //     $img_path = Storage::disk('uploads')->put('img_uploads', $request->img_apartment); 
            
        //     $form_data['img_apartment'] = $img_path;
        // }
        
        // dd($form_data);

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

        $request->validate([
            'title_apartment'=>'required|max:250|string',
            'rooms'=>'required|min:2|numeric',
            'beds'=>'required|min:1|numeric',
            'bathrooms'=>'required|min:1|numeric',
            'sqr_meters'=>'required|min:70|numeric',
            // 'img_apartment'=>'required|image|max:250',
            'description'=>'nullable|string',
            
        ]);

        $form_data = $request->all();

        $apartment->update($form_data);

        return to_route('admin.apartments.show', $apartment);
    }

    public function destroy(Apartment $apartment){
        $apartment->delete();
        return to_route('admin.apartments.index');
    }
}
