<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flat;
use App\Models\Phase;
use App\Models\Society;
use App\Models\Wing;

use Illuminate\Http\Request;

class FlatController extends Controller
{
    public function index()
    {
        $flats = Flat::with('wing.phase.society')->get();
        return view('admin.flat.index', compact('flats'));
    }

    public function create()
    {
         $societies = Society::all();
        $phases = Phase::all();
        $wings = Wing::all();

        return view('admin.flat.create', compact('societies','phases','wings'));    
    
    //     $wings = Wing::with('phase.society')->get();
    //     return view('admin.flat.create', compact('wings'));
     }

    public function edit(Flat $flat)
    {

         $societies = Society::all();
        $phases = Phase::all();
        $wings = Wing::all();

        return view('admin.flat.edit', compact('flat','societies','phases','wings'));    
    
        // $wings = Wing::with('phase.society')->get();
        // return view('admin.flat.edit', compact('flat', 'wings'));
    }

public function update(Request $request, Flat $flat)
{
    $request->validate([
        'wing_id'     => 'required|exists:wings,id',
        'flat_number' => 'required|string|max:20',
        'floor_no'    => 'required|integer|min:0',
        'flat_type'   => 'required|string|max:20',
        'status'      => 'required|in:vacant,occupied',
    ]);

    $flat->update([
        'wing_id'     => $request->wing_id,
        'flat_number' => $request->flat_number,
        'floor_no'    => $request->floor_no,
        'flat_type'   => $request->flat_type,
        'status'      => $request->status,
    ]);

    return redirect()->route('admin.flat.index')
                     ->with('success', 'Flat updated successfully');
}
    public function store(Request $request)
    {
        $request->validate([
            'wing_id' => 'required|exists:wings,id',
            'flat_number' => 'required',
            'floor_no' => 'required|integer|min:0',
            'flat_type' => 'required|in:1RK,1BHK,2BHK,3BHK',
        ]);

        Flat::create($request->all());

        return redirect()->route('admin.flat.index')
            ->with('success','Flat added successfully');
    }
    public function show(Flat $flat)
{
    return view('admin.flat.show', compact('flat'));
}
}
