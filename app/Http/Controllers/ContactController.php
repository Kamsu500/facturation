<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
      return view('contact.create');
    }
    public function store()
    {
        $data=request()->validate([
          'name'=>'required',
          'email'=>'required|email',
          'message'=>'required'
        ]);

        Mail::to('kamsudylane@gmail.com')->locale('fr')->send(new ContactMail($data));

        flash('message envoye avec succes')->success()->important();

        return view('contact.create');
    }
    public function show()
    {
      return view('auth.profil');
    }

    public function  updateProfil(Request $request ,$id)
    {
        $user=User::find($id);
        $user->password=Hash::make($request->input('password'));
        flash('profil modifié avec succès')->success()->important();
        $user->update();

        return redirect()->route('home');
    }
}
