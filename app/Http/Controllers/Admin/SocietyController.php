<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    public function index()
    {
        $societies = Society::all();
        return view('admin.society.index', compact('societies'));
    }

    public function create()
    {
        return view('admin.society.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'society_name'     => 'required|string|max:255',
            'registration_no'  => 'required|string|max:100',
            'address'          => 'required|string',
            'city'             => 'required|string',
            'pincode'          => 'required|string|max:10',
        ]);

        Society::create([
              'owner_id'        => auth()->id(),
            'society_name'    => $request->society_name,
            'registration_no' => $request->registration_no,
            'address'         => $request->address,
            'city'            => $request->city,
            'pincode'         => $request->pincode,
        ]);

        return redirect()->route('admin.society.index')
            ->with('success', 'Society added successfully');
    }
}
