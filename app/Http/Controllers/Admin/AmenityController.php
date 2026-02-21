<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    // List
    public function index()
    {
        $amenities = Amenity::latest()->get();
        return view('admin.amenities.index', compact('amenities'));
    }

    // Show Add Form
    public function create()
    {
        return view('admin.amenities.create');
    }

    // Store
    public function store(Request $request)
    {
        Amenity::create($request->all());

        return redirect()->route('admin.amenities.index')
            ->with('success', 'Amenity added successfully!');
    }

    // Edit Form
    public function edit(Amenity $amenity)
    {
        return view('admin.amenities.edit', compact('amenity'));
    }

    // Update
    public function update(Request $request, Amenity $amenity)
    {
        $amenity->update($request->all());

        return redirect()->route('admin.amenities.index')
            ->with('success', 'Amenity updated successfully!');
    }

    // Delete
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        return back()->with('success', 'Amenity deleted!');
    }
}
