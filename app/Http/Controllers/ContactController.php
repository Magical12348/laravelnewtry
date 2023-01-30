<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\KidContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function syllabus()
    {
        $filePath = public_path("/pdf/Your-Personality-Type.pdf");

        // $filePath = public_path("/pdf/brochure.pdf");
        return response()->download($filePath);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|alpha_spaces',
            'phone_number' => 'required|digits:10',
        ]);

        Contact::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);

        return back()->with('status', 'Thank You For Contacting Our Team Will Reach You.');
    }

    public function kidcontact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|alpha_spaces',
            'mobile_number' => 'required|digits:10',
        ]);

        KidContact::create([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
        ]);

        return back()->with('status', 'Thank You For Contacting Our Team Will Reach You.');
    }

    public function kidContactDestroy($id)
    {
        $contact = KidContact::find($id);

        $contact->delete();

        return back()->with('status', 'Contact Deleted Successfully');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return back()->with('status', 'Contact Deleted Successfully');
    }
}
