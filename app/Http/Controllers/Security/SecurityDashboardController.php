<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\Society;
use App\Models\Phase;
use App\Models\Wing;
use App\Models\Flat;
use App\Models\User;

use App\Models\Event;

class SecurityDashboardController extends Controller
{
    public function index()
    {
        $societiesCount = Society::count();
        $phasesCount    = Phase::count();
        $wingsCount     = Wing::count();
        $flatsCount     = Flat::count();
        $eventsCount     = Event::count();

        $ownersCount    = User::where('role', 'owner')->count();

        
        // ✅ Dynamic chart data
        $chartLabels = ['Societies', 'Phases', 'Wings', 'Flats', 'Owners','Events'];
        $chartData = [
            $societiesCount,
            $phasesCount,
            $wingsCount,
            $flatsCount,
            $ownersCount,
            $eventsCount
        ];

        return view('security.dashboard', compact(
            'societiesCount',
            'phasesCount',
            'wingsCount',
            'flatsCount',
            'ownersCount',
            'eventsCount',
             'chartLabels',
            'chartData'
        ));
    }
}
