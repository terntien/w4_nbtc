<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use DB;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('contacts.index', compact('contact'));
    }

   


    public function store(Request $request)
    {
        $contact = new contact();
   
        $contact->namecontact = $request->input('namecontact');
        $contact->address = $request->input('address');
        $contact->area = $request->input('area');
        $contact->phone = $request->input('phone');
        $contact->tel = $request->input('tel');
        $contact->email = $request->input('email');
        $contact->web = $request->input('web');
       
        $contact->save();
        return redirect('/contacts')->with('success', ' saved!');
    }



    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.index', compact('contact'));
    }





    public function edit($id)
    { 
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact')); 


    }

    
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'namecontact'     => 'required',
            'address'    => 'required',
            'area'    => 'required',
            'phone'    => 'required',
            'tel'    => 'required',
            'email'    => 'required',
            'web'    => 'required',
            
        ]);

        $contact = Contact::find($id);
        
        $contact->namecontact = $request->get('namecontact');
        $contact->address = $request->get('address');
        $contact->area = $request->get('area');
        $contact->phone = $request->get('phone');
        $contact->tel = $request->get('tel');
        $contact->email = $request->get('email');
        $contact->web = $request->get('web');
        
        $contact->save();

        return redirect('/contacts');
    
    }

   
   
}
