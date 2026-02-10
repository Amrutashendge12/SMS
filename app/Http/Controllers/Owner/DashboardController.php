<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Security;
use App\Models\Attendance;
use App\Models\Flat;
use App\Models\Society;
use App\Models\Wing;
use App\Models\Phase;
use Carbon\Carbon;

use App\Models\Event;

class DashboardController extends Controller
{
    
public function index()
{

     // Chart labels
        $chartLabels = [
            'Societies',
            'Phases',
            'Wings',
            'Flats',
            'Securities',
            'Events'
        ];

        // Chart data (dynamic)
        $chartData = [
            Society::count(),
            Phase::count(),
            Wing::count(),
            Flat::count(),
            Security::count(),
            Event::count(),
        ];

    return view('owner.dashboard', [
        'totalSocieties'   => Society::count(),
        'totalPhases'      => Phase::count(),
        'totalWings'       => Wing::count(),
        'totalFlats'       => Flat::count(),
        'totalEvents'       => Event::count(),
        'totalSecurities'  => Security::count(),
        'todayAttendance'  => Attendance::whereDate('date', Carbon::today())->count(),

        'chartLabels' => $chartLabels,
        'chartData'   => $chartData,
    ]);
}

}
