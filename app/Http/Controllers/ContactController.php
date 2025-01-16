<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function delete($contact)
    {
        $singleContact = ContactModel::where(['id' => $contact])->first();

        if($singleContact === null)
        {
            die("Ovaj kontakt ne postoji");
        }
        $singleContact->delete();
        return redirect()->back();
    }
    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view('allContacts', compact('allContacts'));
    }
    public function sendContact(Request $request)
    {
        $request->validate([
            "email" => "required|string",
            "subject" => "required|string",
            "description" => "required|string|min:5",
        ]);

        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("description"),
        ]);

        return redirect("/shop");
    }

    public function singleContact(Request $request, $id) // $id mora biti isto ime kao u url ovom /admin/contact/edit/{id}, odatle ce prihvatiti informaciju koji je id u pitanju
    {
        $contact = ContactModel::where(['id' => $id])->first();

        if($contact === null)
        {
            die("OVAJ KONTAKT NE POSTOJI");
        }

        return view("contacts.edit", compact("contact")); // Controler otvara blade, a sa compact prosledjujemo contact u blade
    }

    public function edit(Request $request, $id)
    {
        $contact = ContactModel::where(['id' => $id])->first();

        if($contact === null)
        {
            die("OVAJ KONTAKT NE POSTOJI");
        }

        $contact->email = $request->get("email");  // ovom emailu iz baze: $contact->email dodaj ovu vrednost:$request->get("email");
        $contact->subject = $request->get("subject");
        $contact->message = $request->get("message");

        $contact->save();
        return redirect("/admin/all-contacts");
    }
}
