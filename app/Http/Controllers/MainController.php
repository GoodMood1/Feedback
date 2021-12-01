<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class MainController extends Controller
{
    public function index(){
        $title = 'First Laravel Project';
        $header = '<em>Home Page</em>';
        $users = ['Vasya', 'Petya'];

        $contacts = Contact::all();
        return view('home', compact('title', 'header', 'users', 'contacts'));
    }
    public function contacts(){
        return view('contacts');
    }
    public function showContacts($id){
        $contact = Contact::Find($id);
        dd($contact);
    }


    public function getContacts(Request $request){
        // dump($request->all());
        $request->validate([
            'login' => 'required|min:3',
            'email' => 'required|email',
        ]);

        $contact = new Contact();
        $contact->login = $request->login;
        $contact->email = $request->email;
        $contact->save();
        return redirect('/')->with('success', 'Thank, '. $contact->login);
    }
}
