<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Phase;
use Illuminate\Support\Facades\Auth;

class PhaseController extends Controller
{
    public function index()
    {
        // Logged-in owner cha data only (via society)
        $phases = Phase::whereHas('society', function ($q) {
                        $q->where('owner_id', Auth::id());
                    })
                    ->orderBy('id', 'desc')
                    ->get();

        return view('owner.phases.index', [
            'phases' => $phases
        ]);
    }
}
