<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Security;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function index()
    {
        $securities = Security::whereHas('society', function ($q) {
                $q->where('owner_id', Auth::id());
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('owner.securities.index', compact('securities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'society_id' => 'required|exists:societies,id',
        ]);

        Security::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'society_id' => $request->society_id,
            'status' => 1,
        ]);

        return redirect()->back()->with('success', 'Security added successfully');
    }
}
