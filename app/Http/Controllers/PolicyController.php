<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::all();
        return view('Admin.Policy.index', compact('policies'));
    }

    public function create()
    {
        return view('Admin.Policy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Policy::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return back()->with('status', 'terms created');
    }

    public function edit(Policy $policy)
    {
        return view('Admin.Policy.edit', compact('policy'));
    }

    public function update(Request $request, Policy $policy)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $policy->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return back()->with('status', 'terms Updated');
    }

    public function destroy(Policy $policy)
    {
        $policy->delete();

        return back()->with('status', 'terms deleted');
    }
}
