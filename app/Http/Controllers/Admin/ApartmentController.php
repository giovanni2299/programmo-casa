<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    //
    public function index(){
        $apartments = Apartment::all();

        return view('admin.apartments.index', compact('apartments'));
    }

    public function create(){
        return view('admin.apartments.create');
    }

    public function store(){
        
    }

    public function show(Apartment $apartment){
        return view('admin.apartments.show', compact('apartment'));
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}
