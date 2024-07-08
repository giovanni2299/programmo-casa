<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //Dobbiamo, da front end, creare il messaggio ed inviare la richiesta attraverso axios a laravel per la creazione
    public function store(Request $request){
        // dd($request);
        $users = User::all()->pluck('id');

        // $request->validate([
        //     'name'=>'required|max:60|string',
        //     'surname'=>'required|max:60|string',
        //     'email_sender'=>'required|max:250|string',
        //     'text'=>'required|max:65535|string',
        //     'phone_number'=>'nullable|string',
        // ]);

        $form_data = $request->all();

        $new_message = Message::create($form_data);

        return response()->json([
            'success' => true,
            'results' => $new_message
        ]);
    }
}
