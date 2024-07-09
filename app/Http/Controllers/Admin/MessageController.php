<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::all();
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message, Apartment $apartments){
        $apartment = Apartment::where('id', $message->apartment_id)->get();
        return view('admin.messages.show', compact('message', 'apartment'));
    }
}
