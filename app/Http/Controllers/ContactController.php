<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $contacts = Contact::latest()->get();
        return view('app.contact.index', compact('user', 'contacts'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|email',
                'message' => 'required|max:200',
            ]);

            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->save();

            return redirect()->back()->with('success', 'Terimakasih telah menghubungi kami');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Data kontak berhasil dihapus');
    }
}
