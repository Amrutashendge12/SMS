<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\Society;
use App\Models\Phase;
use App\Models\Wing;
use App\Models\Flat;
use App\Models\User;
use App\Models\Maintenance;
use App\Models\Notice;
use App\Models\Visitor;
use App\Models\Amenity;
use App\Models\Event;
use App\Models\Parking;

use Carbon\Carbon;

class SecurityDashboardController extends Controller
{
    public function index()
    {
        // Basic Counts
        $societiesCount = Society::count();
        $phasesCount    = Phase::count();
        $wingsCount     = Wing::count();
        $flatsCount     = Flat::count();
        $ownersCount    = User::where('role', 'owner')->count();
        $eventsCount    = Event::count();
        $totalMaintenance = Maintenance::count();
        $latestNotices  = Notice::count();
        $totalVisitors  = Visitor::count();
        $totalAmenities = Amenity::count();
        $totalParking = Parking::count();
        $parkedVehicles = Parking::where('status','Parked')->count();
        $exitedVehicles = Parking::where('status','Exited')->count();

        
        // Visitor Daily Trend Graph
        $visitorTrend = Visitor::selectRaw("DATE(check_in) as date, COUNT(*) as total")
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Chart Data
        $chartLabels = ['Societies', 'Phases', 'Wings', 'Flats', 'Owners', 'Events'];
        $chartData = [
            $societiesCount,
            $phasesCount,
            $wingsCount,
            $flatsCount,
            $ownersCount,
            $eventsCount,
        ];

        // Maintenance Monthly Graph Data
        $maintenanceData = Maintenance::selectRaw("MONTH(created_at) as month, COUNT(*) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $months = [];
        $counts = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] = Carbon::create()->month($i)->format('M');
            $counts[] = $maintenanceData[$i] ?? 0;
        }

        return view('security.dashboard', compact(
            'societiesCount',
            'phasesCount',
            'wingsCount',
            'flatsCount',
            'ownersCount',
            'eventsCount',
            'totalMaintenance',
            'latestNotices',
            'totalVisitors',
            'totalAmenities',
            'totalParking',
            'parkedVehicles',
            'exitedVehicles',

            'chartLabels',
            'chartData',
            'months',
            'counts',
            'visitorTrend'
        ));
    }
}
