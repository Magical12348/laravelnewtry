<?php

namespace App\Http\Controllers;

use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = SliderImage::all();
        return view('Admin.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $slider_path = $request->image->store('sliders', 'public');

        SliderImage::create([
            'image' => $slider_path
        ]);

        return back()->with('status', 'Image Uploaded Successfully');
    }

    public function destroy($id)
    {
        $slider = SliderImage::find($id);

        Storage::disk('public')->delete('sliders/' . $slider->image);

        $slider->delete();

        return back()->with('status', 'Image Deleted Successfully');
    }
}
