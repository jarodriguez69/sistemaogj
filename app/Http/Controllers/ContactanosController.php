<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactanosController extends Controller
{
    public function index()
    {
        return view('contactanos.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required'
        ]); 

        $correo = new ContactanosMailable($request->all());
        Mail::to('rodriguezjose519@gmail.com')->send($correo);
    
        return redirect()->route('contactanos.index')->with('info','Mensaje Enviado');
    }
}
