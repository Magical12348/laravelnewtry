<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = BannerImage::all();
        return view('Admin.banner.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $banner_path = $request->image->store('banners', 'public');

        BannerImage::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $banner_path,
            'is_video' => $request->has('is_video')
        ]);

        return back()->with('status', 'Image Uploaded Successfully');
    }

    public function destroy($id)
    {
        $banner = BannerImage::find($id);

        Storage::disk('public')->delete('banners/' . $banner->image);

        $banner->delete();

        return back()->with('status', 'Image Deleted Successfully');
    }
}
