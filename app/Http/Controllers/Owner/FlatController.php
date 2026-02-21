<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Flat;
use Illuminate\Support\Facades\Auth;

class FlatController extends Controller
{
    public function index()
    {
        // Logged-in owner cha data only
        $flats = Flat::where('owner_id', Auth::id())
                     ->orderBy('id', 'desc')
                     ->get();

        return view('owner.flats.index', [
            'flats' => $flats
        ]);
    }
}
