<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Flat;

use Illuminate\Http\Request;
use Carbon\Carbon;

class VisitorController extends Controller
{
    // 🟢 Show all visitors
    public function index()
    {
        $visitors = Visitor::with('flat.wing.phase.society')
                    ->latest()
                    ->get();

        return view('visitors.index', compact('visitors'));
    }

    // 🟢 Show add form
    public function create()
{
    $flats = Flat::with(['wing.phase.society'])->get();

    return view('visitors.create', compact('flats'));
}


    // 🟢 Store visitor entry
    public function store(Request $request)
    {
        Visitor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'flat_id' => $request->flat_id,

            'purpose' => $request->purpose,
            'check_in' => Carbon::now(),   // auto entry time
        ]);

        return redirect()->route('security.visitors.index')
            ->with('success','Visitor entry saved!');
    }

    // 🟢 Mark Exit
    public function exit($id)
    {
        $visitor = Visitor::find($id);
        $visitor->check_out = Carbon::now();
        $visitor->save();

        return back()->with('success','Visitor exited successfully!');
    }
}
