<?php

namespace App\Http\Controllers;

use App\Models\{Faq, User, Course, Policy, Contact, Installment, KidContact, Placement};
use Illuminate\Http\Request;
use App\Exports\ServiceExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::query()
            ->isActive()
            ->when(request()->has('type'), function ($query) {
                $query->where('type', request('type'));
            }, function ($query) {
                $query->where('type', NULL);
            })->get();

        $due_dates = Installment::with('course')->where('user_id', auth()->id())->where('payment_status', 'half')->get();
        $placement_details=Placement::all();
        return view('welcome', compact('courses', 'due_dates','placement_details'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
    public function referral()
    {
        return view('referral-info');
    }

    public function home()
    {
        $contacts = Contact::latest()->get();

        $kids_contacts = KidContact::latest()->get();

        $users = User::where('is_admin', false)->simplepaginate(12);

        return view('home', compact('contacts', 'users', 'kids_contacts'));
    }

    public function exportContact(Request $request)
    {
        $contacts = Contact::select('name', 'phone_number')->find($request->contact_queries);

        return Excel::download(new ServiceExport($contacts), 'popup_contact.csv');
    }

    public function exportKids(Request $request)
    {
        $contacts = KidContact::select('name', 'mobile_number')->find($request->kids_queries);

        return Excel::download(new ServiceExport($contacts), 'kids_contact.csv');
    }

    public function terms()
    {
        $terms = Policy::all();

        return view('terms', compact('terms'));
    }

    public function services()
    {
        return view('services');
    }

    public function projects()
    {
        return view('projects');
    }

    public function faqs()
    {
        $faqs = Faq::all();

        return view('faqs', compact('faqs'));
    }

    public function certificate()
    {
        return view('certificate.show');
    }
}
