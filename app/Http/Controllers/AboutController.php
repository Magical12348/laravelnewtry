<?php

namespace App\Http\Controllers;

use App\Models\AboutBanner;
use App\Models\AboutSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    // public function index()
    // {
    //     $about_images = AboutBanner::all();

    //     $about_sliders = AboutSlider::all();

    //     return view('Admin.About.index', compact('about_images', 'about_sliders'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required',
    //         'title' => 'required',
    //         'description' => 'required',
    //     ]);

    //     $imageName = time() . '-' . $request->image->getClientOriginalName();

    //     $request->image->move(public_path() . '/uploads/about', $imageName);

    //     AboutBanner::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'image' => $imageName,
    //     ]);

    //     return back()->with('status', 'Image Uploaded Successfully');
    // }

    // public function destroy($id)
    // {
    //     $banner = AboutBanner::find($id);

    //     File::delete(public_path() . '/uploads/about/' . $banner->image);

    //     $banner->delete();

    //     return back()->with('status', 'Image Deleted Successfully');
    // }

    // public function aboutSliderStore(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required',
    //     ]);

    //     $imageName = time() . $request->image->getClientOriginalName();

    //     $request->image->move(public_path() . '/uploads/about/', $imageName);

    //     AboutSlider::create([
    //         'image' => $imageName
    //     ]);

    //     return back()->with('status', 'Image Uploaded Successfully');
    // }

    // public function aboutSliderDestroy($id)
    // {
    //     $slider = AboutSlider::find($id);

    //     File::delete(public_path() . '/uploads/about/' . $slider->image);

    //     $slider->delete();

    //     return back()->with('status', 'Image Deleted Successfully');
    // }
}
