<?php

namespace App\Http\Controllers;

use App\Exports\ServiceExport;
use App\Models\ServiceForm;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ServiceFormController extends Controller
{
    public function index()
    {
        $services = ServiceForm::latest()->get();

        return view('Admin.service.index', compact('services'));
    }

    public function export(Request $request)
    {
        $request->validate([
            'queries' => 'required|array',
        ]);

        $services = ServiceForm::select('name', 'email', 'phone_number')->find($request->queries);

        return Excel::download(new ServiceExport($services), 'services.csv');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|digits:10',
            'description' => 'required',
        ]);

        ServiceForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'description' => $request->description,
        ]);

        return back()->with('status', 'Your request has been submitted. We will get back to you shortly.');
    }

    public function show($id)
    {
        $service = ServiceForm::find($id);

        return view('Admin.service.show', compact('service'));
    }

    public function destroy($id)
    {
        $service = ServiceForm::find($id);
        $service->delete();

        return back()->with('status', 'Service has been deleted successfully.');
    }
}
