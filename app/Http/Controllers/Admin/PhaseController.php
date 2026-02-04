<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phase;
use App\Models\Society;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    public function index()
    {
        $phases = Phase::with('society')->get();
        return view('admin.phase.index', compact('phases'));
    }

    public function create()
    {
        $societies = Society::all();
        return view('admin.phase.create', compact('societies'));
    }

    public function edit(Phase $phase)
{
    $societies = Society::all();
    return view('admin.phase.edit', compact('phase', 'societies'));
}

public function update(Request $request, Phase $phase)
{
    $request->validate([
        'society_id' => 'required|exists:societies,id',
        'phase_name' => 'required|string|max:255',
    ]);

    $phase->update($request->all());

    return redirect()->route('admin.phase.index')
                     ->with('success', 'Phase updated successfully');
}

    public function store(Request $request)
    {
        $request->validate([
            'society_id' => 'required|exists:societies,id',
            'phase_name' => 'required'
        ]);

        Phase::create($request->all());

        return redirect()->route('admin.phase.index')
            ->with('success','Phase added successfully');
    }
}

