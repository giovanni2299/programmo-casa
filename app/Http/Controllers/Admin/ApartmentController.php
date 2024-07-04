<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    //
    public function index(Request $request){
        if($request->has('trash')){
            $apartments = Apartment::onlyTrashed()->get();
            $apartment_bin = 1;
        }else{
            $apartments = Apartment::all();
            $apartment_bin = 0;
            
        }
        $my_ip = $request->ip();
        // dd($my_ip);
        
        return view('admin.apartments.index', compact('apartments', 'apartment_bin'));
        
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

    public function show(Apartment $apartment, View $view, Request $request){

        // i take the ip_number from the visitor
        $my_ip = $request->ip();
        // i creat an istance from the object View
        $new_view = new View;
        // i make the attributes
        $new_view->ip_number = $my_ip;
        $new_view->apartment_id = $apartment['id'];
        // i save the record inside the db
        $new_view->save();

        $view_date = View::where('ip_number', $my_ip);
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

    public function restore($id){
        // dd($id);
        $apartment = Apartment::withTrashed()->find($id);
        // dd($apartment);
        if($apartment->trashed()){
            $apartment->restore();
        }
        return back();
    }

    // added a function that receives the parameter id
    public function forceDestroy($id){

        // it uses the model Apartment to find the right id from the soft deleted Apartments in the db
        $apartment = Apartment::withTrashed()->find($id);
        // $apartment->forceDelete();
        if($apartment->trashed()){
            // it permanently deletes the record from the db
            $apartment->forceDelete();
        }

        // it bring back the user to his apartments
        return back();
        // return to_route('admin.apartments.index')
        
    }
}
