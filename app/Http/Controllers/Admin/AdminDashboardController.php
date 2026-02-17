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
use App\Models\Maintenance;
use App\Models\Notice;   
use App\Models\Visitor;
use App\Models\Amenity;
use App\Models\AmenityBooking;
use App\Models\Parking;
use App\Models\Bill;

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

        $totalMaintenance = Maintenance::count();
        $latestNotices = Notice::count();
        $totalVisitors = Visitor::count();
        // Visitor Daily Trend Graph Data
        $visitorTrend = Visitor::selectRaw("DATE(check_in) as date, COUNT(*) as total")
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $totalAmenities = Amenity::count();
        $totalBookings = AmenityBooking::count();
        $pendingBookings = AmenityBooking::where('status','Pending')->count();

        $totalParking = Parking::count();
        $parked = Parking::where('status','Parked')->count();
        $exited = Parking::where('status','Exited')->count();

        $totalBills = Bill::count();

        $paidBills = Bill::where('status','Paid')->count();

        $pendingBills = Bill::where('status','Pending')->count();

        $totalDue = Bill::where('status','Pending')->sum('amount');

// Maintenance Monthly Graph Data
$maintenanceData = Maintenance::selectRaw("MONTH(created_at) as month, COUNT(*) as total")
    ->groupBy('month')
    ->orderBy('month')
    ->pluck('total','month');

// Prepare Month Labels & Counts
$months = [];
$counts = [];

for ($i = 1; $i <= 12; $i++) {
    $months[] = Carbon::create()->month($i)->format('M');
    $counts[] = $maintenanceData[$i] ?? 0;
}

        return view('admin.dashboard', [
            'owners'      => User::where('role', 'owner')->count(),
            'flats'       => Flat::count(),
            'societies'   => Society::count(),
            'phases'      => Phase::count(),
            'wings'       => Wing::count(),
            'totalEvents'       => Event::count(),
            'totalSecurities'  => Security::count(),
            'todayAttendance' => Attendance::whereDate('date', Carbon::today())->count(),
            'totalMaintenance' => $totalMaintenance, 
            'latestNotices' => $latestNotices,
            'totalVisitors' => $totalVisitors,
            'totalAmenities' => $totalAmenities,
            'totalBookings' => $totalBookings,
            'pendingBookings' => $pendingBookings,
            'totalParking'=> $totalParking,
            'parkedVehicles'=>$parked,
            'exitedVehicles'=>$exited,
            'totalBills' => $totalBills,
            'paidBills' => $paidBills,
            'pendingBills' => $pendingBills,
            'totalDue' => $totalDue,
            'chartLabels' => $chartLabels,
            'chartData'   => $chartData,
             'months' => $months,   // ⭐ IMPORTANT
            'counts' => $counts ,
            'visitorTrend' =>$visitorTrend

        ]);
    }
    
}
