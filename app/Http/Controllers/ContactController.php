<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepo;
    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }
    public function index()
    {
        return view('contact');
    }

    public function delete(ContactModel $contact)
    {
        $contact->delete();
        return redirect()->back();
    }
    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view('allContacts', compact('allContacts'));
    }
    public function sendContact(SendContactRequest $request)
    {
        $this->contactRepo->createNew($request);
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
