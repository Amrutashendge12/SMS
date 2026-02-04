<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Society;
use App\Models\Phase;
use App\Models\Wing;
use App\Models\Flat;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'owners' => User::where('role', 'owner')->count(),
            'flats' => Flat::count(),
            'societies' => Society::count(),
            'phases' => Phase::count(),
            'wings' => Wing::count(),
        ]);
    }
}
