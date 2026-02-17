<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramFeed;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InstagramController extends Controller
{
    public function index() {
        $feeds = InstagramFeed::all();
        return view('admin.instagram.index', compact('feeds'));
    }

    public function create() {
        $products = Product::all(); // Get products so you can "tag" them
        return view('admin.instagram.create', compact('products'));
    }

    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        $feed = new InstagramFeed;
        $feed->product_id = $request->product_id;
        $feed->insta_link = $request->insta_link;
        $feed->status = $request->status == true ? '1' : '0';

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/instagram/', $filename);
            $feed->image = 'uploads/instagram/'.$filename;
        }
        $feed->save();
        return redirect('admin/instagram')->with('message','Instagram Look Added!');
    }
}