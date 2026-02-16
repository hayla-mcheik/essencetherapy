<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Get the single record or create it if missing
        $about = About::firstOrCreate(['id' => 1]);
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::firstOrCreate(['id' => 1]);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('message', 'About Us Content Updated Successfully');
    }
}