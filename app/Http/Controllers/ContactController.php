<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function AdminContact(){
        $contact = Contact::all();

        return view('admin.contact.index', compact('contact'));
    }

    public function AdminAddContact(){
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request){
        Contact::insert([
            'address'           => $request->address,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'created_at'        => Carbon::now()
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact created succesfully');
    }
}
