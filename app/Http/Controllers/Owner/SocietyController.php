<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Society;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    public function index()
{
    // Logged-in owner cha data only
    $societies = Society::where('owner_id', Auth::id())
                        ->orderBy('id', 'desc')
                        ->get();

    return view('owner.societies.index', [
        'societies' => $societies
    ]);
}
public function store(Request $request)
{
    $request->validate([
        'society_name' => 'required|string|max:255',
    ]);

    Society::create([
        'society_name' => $request->society_name,
        'owner_id' => Auth::id(),   //  PERMANENT FIX
    ]);

    return redirect()->back()->with('success', 'Society added successfully');
}

}
