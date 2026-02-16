<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        // Get the single banner record or create a blank one if it doesn't exist
        $banner = Banner::firstOrCreate(['id' => 1]); 
        return view('admin.banner.index', compact('banner'));
    }

    public function edit()
    {
        $banner = Banner::firstOrCreate(['id' => 1]);
        return view('admin.banner.edit', compact('banner'));
    }

public function update(Request $request)
{
    $banner = Banner::first();
    
    if (!$banner) {
        $banner = new Banner();
    }

    $request->validate([
        'title'    => 'nullable|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $banner->title = $request->title;
    $banner->subtitle = $request->subtitle;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banner'), $filename);
            $banner->image = 'uploads/banner/' . $filename;
        }

    $banner->save();

    return redirect()->route('admin.banners.index')
        ->with('message', 'Banner Updated Successfully');
}
}