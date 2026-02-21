<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    // Show complaints
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $complaints = Complaint::with('user')->latest()->get();
        } else {
            $complaints = Complaint::where('user_id', Auth::id())->latest()->get();
        }

        return view('complaints.index', compact('complaints'));
    }

    // Create form
    public function create()
    {
        return view('complaints.create');
    }

    // Store complaint
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Complaint::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('complaints.index')->with('success','Complaint submitted');
    }

    // Admin resolve complaint
    public function resolve($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->update(['status' => 'resolved']);

        return back()->with('success','Complaint resolved');
    }

    // Delete complaint
    public function destroy($id)
    {
        Complaint::findOrFail($id)->delete();
        return back()->with('success','Deleted');
    }
}
