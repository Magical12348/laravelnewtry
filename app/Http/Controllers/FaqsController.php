<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();

        return view('Admin.Faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('Admin.Faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return back()->with('status', 'Faq Added');
    }

    public function edit(Faq $faq)
    {
        return view('Admin.Faqs.edit', compact('faq'));
    }

    public function update(Faq $faq, Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return back()->with('status', 'Faq Updated');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()->with('status', 'Faq Deleted');
    }
}
