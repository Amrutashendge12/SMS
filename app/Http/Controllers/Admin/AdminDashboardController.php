<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Society;
use App\Models\Phase;
use App\Models\Wing;
use App\Models\Flat;
use App\Models\Security;
use App\Models\Attendance;
use Carbon\Carbon;

use App\Models\Event;

class AdminDashboardController extends Controller
{
    public function index()
    {

         // 🔹 Chart labels
        $chartLabels = [
            'Societies',
            'Phases',
            'Wings',
            'Flats',
            'Owners',
            'Securities',
            'Events'
        ];

        // 🔹 Chart data (Admin = full data)
        $chartData = [
            Society::count(),
            Phase::count(),
            Wing::count(),
            Flat::count(),
            User::where('role', 'owner')->count(),
            Security::count(),
            Event::count(),
        ];


        return view('admin.dashboard', [
            'owners'      => User::where('role', 'owner')->count(),
            'flats'       => Flat::count(),
            'societies'   => Society::count(),
            'phases'      => Phase::count(),
            'wings'       => Wing::count(),
            'totalEvents'       => Event::count(),
            'totalSecurities'  => Security::count(),
            'todayAttendance' => Attendance::whereDate('date', Carbon::today())->count(),

            'chartLabels' => $chartLabels,
            'chartData'   => $chartData,
        ]);
    }
}
