<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wing;
use App\Models\Phase;
use App\Models\Society;

use Illuminate\Http\Request;

class WingController extends Controller
{
    public function index()
    {
        $wings = Wing::with('phase.society')->get();
        return view('admin.wing.index', compact('wings'));
    }

    public function create()
    {
        $societies = Society::all();   // add this
        $phases = Phase::all();  
        return view('admin.wing.create', compact('societies','phases'));
 
      //  $phases = Phase::with('society')->get();
      //  return view('admin.wing.create', compact('phases'));
    }

    public function edit(Wing $wing)
    {
        $societies = Society::all();   // add this
        $phases = Phase::all();  
        return view('admin.wing.edit', compact('wing','societies','phases'));
 
    // $phases = Phase::with('society')->get();
    // return view('admin.wing.edit', compact('wing', 'phases'));
    }

public function update(Request $request, Wing $wing)
{
    $request->validate([
        'phase_id' => 'required|exists:phases,id',
        'wing_name' => 'required|string|max:10',
        'total_floors' => 'required|integer|min:1',
    ]);

    $wing->update([
        'phase_id' => $request->phase_id,
        'wing_name' => $request->wing_name,
        'total_floors' => $request->total_floors,
    ]);

    return redirect()->route('admin.wing.index')
                     ->with('success', 'Wing updated successfully');
}
    public function store(Request $request)
    {
        $request->validate([
            'phase_id' => 'required|exists:phases,id',
            'wing_name' => 'required',
            'total_floors' => 'required|integer|min:1'
        ]);

        Wing::create($request->all());

        return redirect()->route('admin.wing.index')
            ->with('success', 'Wing added successfully');
    }
}
