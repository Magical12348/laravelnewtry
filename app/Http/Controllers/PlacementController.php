<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function index()
    {
        $placement_details=Placement::all();

        return view('Admin.Placement.index',compact('placement_details'));
    }


    public function create()
    {
        return view('Admin.Placement.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'full_name' => 'required',
            'company_name' => 'required',
            'job_title' => 'required',
            'location' => 'required',
            'package' => 'required',
            'placement_date' => 'required|date',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5125'
        ]);




        $imageName = time() . '.' . $request->image->extension();

        $imagePath = $request->image->storeAs('placement_details', $imageName, 'public');

        Placement::create([
            'full_name' => $request->full_name,
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'location' => $request->location,
            'package' => $request->package,
            'placement_date' => $request->placement_date,

            'image' => $imagePath,


        ]);

        return back()->with('status', 'Placement Details has been added');

    }



    public function edit(Placement $placement_details)
    {
        return view('Admin.Placement.edit', compact('placement_details'));
    }



    public function update(Request $request, Placement $placement)
    {
        $request->validate([
            'full_name' => 'required',
            'company_name' => 'required',
            'job_title' => 'required',
            'location' => 'required',
            'package' => 'required',
            'placement_date' => 'required|date',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5125'
        ]);




        $imageName = time() . '.' . $request->image->extension();

        $imagePath = $request->image->storeAs('placement_details', $imageName, 'public');



        $placement->update([
            'full_name' => $request->full_name,
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'location' => $request->location,
            'package' => $request->package,
            'placement_date' => $request->placement_date,

            'image' => $imagePath,

        ]);

        return back()->with('status', 'Placement Details has been updated');
    }




    public function destroy(Placement $placement)
    {
        $placement->delete();
        return back()->with('status', 'Placement has been deleted');
    }




}
