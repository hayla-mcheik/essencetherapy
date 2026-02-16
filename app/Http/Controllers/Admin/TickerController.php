<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticker;
use Illuminate\Http\Request;

class TickerController extends Controller
{
    public function index()
    {
        $tickers = Ticker::all();
        return view('admin.ticker.index', compact('tickers'));
    }

    public function store(Request $request)
{
    $request->validate([
        'content' => 'required|string|max:255'
    ]);

    Ticker::create([
        'content' => $request->content
    ]);

    return redirect()->back()->with('message', 'New Ticker Line Added!');
}

    public function update(Request $request, $id)
    {
        $request->validate(['content' => 'required|string|max:255']);
        $ticker = Ticker::findOrFail($id);
        $ticker->update(['content' => $request->content]);

        return redirect()->back()->with('message', 'Ticker Updated!');
    }
}