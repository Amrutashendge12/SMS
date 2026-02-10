<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\Society;
use App\Models\Phase;
use App\Models\Wing;
use App\Models\Flat;
use App\Models\User;

class ViewController extends Controller
{
    public function societies()
    {
        $societies = Society::latest()->get();
        return view('security.societies.index', compact('societies'));
    }

    public function phases()
    {
        $phases = Phase::with('society')->latest()->get();
        return view('security.phases.index', compact('phases'));
    }

    public function wings()
    {
        $wings = Wing::with('phase.society')->latest()->get();
        return view('security.wings.index', compact('wings'));
    }

    public function flats()
    {
        $flats = Flat::with('wing.phase.society')->latest()->get();
        return view('security.flats.index', compact('flats'));
    }

     public function owners()
    {
        $members = User::where('role', 'owner')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('security.owners.index', compact('members'));
    }
   
}
