<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Wing;
use Illuminate\Support\Facades\Auth;

class WingController extends Controller
{
    public function index()
    {
        // Logged-in owner cha data only (via phase -> society)
        $wings = Wing::whereHas('phase.society', function ($q) {
                        $q->where('owner_id', Auth::id());
                    })
                    ->orderBy('id', 'desc')
                    ->get();

        return view('owner.wings.index', [
            'wings' => $wings
        ]);
    }
}
