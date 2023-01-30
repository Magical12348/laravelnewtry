<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('Admin.Certificate.index', compact('certificates'));
    }

    public function create()
    {
        return view('Admin.Certificate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'certificate_number' => 'required',
            'course_name' => 'required',
            'name' => 'required',
            'type' => 'required',
            'date' => 'required|date',
        ]);

        Certificate::create([
            'certificate_number' => $request->certificate_number,
            'course_name' => $request->course_name,
            'name' => $request->name,
            'type' => $request->type,
            'date' => $request->date,
        ]);

        return back()->with('status', 'Certificate has been added');
    }

    public function edit(Certificate $certificate)
    {
        return view('Admin.Certificate.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'certificate_number' => 'required',
            'course_name' => 'required',
            'name' => 'required',
            'type' => 'required',
            'date' => 'required|date',
        ]);

        $certificate->update([
            'certificate_number' => $request->certificate_number,
            'course_name' => $request->course_name,
            'name' => $request->name,
            'type' => $request->type,
            'date' => $request->date,
        ]);

        return back()->with('status', 'Certificate has been updated');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return back()->with('status', 'Certificate has been deleted');
    }

    public function validateCertificate(Request $request)
    {
        $request->validate([
            'certificate_number' => 'required|exists:certificates,certificate_number',
        ]);

        $certificate = Certificate::where('certificate_number', $request->certificate_number)->first();

        return view('certificate.validate', compact('certificate'));
    }
}
