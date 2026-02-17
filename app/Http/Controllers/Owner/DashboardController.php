<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Security;
use App\Models\Attendance;
use App\Models\Maintenance;
use App\Models\Notice;
use App\Models\Flat;
use App\Models\Society;
use App\Models\Wing;
use App\Models\Phase;
use App\Models\Visitor;
use App\Models\Event;
use App\Models\Amenity;
use App\Models\AmenityBooking;
use App\Models\Parking;
use App\Models\Bill;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ===== BASIC COUNTS =====
        $societiesCount = Society::count();
        $phasesCount    = Phase::count();
        $wingsCount     = Wing::count();
        $flatsCount     = Flat::count();
        $securitiesCount = Security::count();
        $eventsCount    = Event::count();

        $totalMaintenance = Maintenance::count();
        $latestNotices    = Notice::count();
        $totalVisitors    = Visitor::count();
        $totalAmenities   = Amenity::count();

        $todayAttendance = Attendance::whereDate('date', Carbon::today())->count();
        $myBookings    = AmenityBooking::where('user_id', auth()->id())->count();
        $totalBookings = AmenityBooking::count();

        $totalParking = Parking::count();
        $parkedVehicles = Parking::where('status','Parked')->count();
        $exitedVehicles = Parking::where('status','Exited')->count();


$userId = auth()->id();

$myTotalBills = Bill::where('user_id',$userId)->count();

$myPaidBills = Bill::where('user_id',$userId)
                   ->where('status','Paid')
                   ->count();

$myPendingBills = Bill::where('user_id',$userId)
                      ->where('status','Pending')
                      ->count();

$myDueAmount = Bill::where('user_id',$userId)
                   ->where('status','Pending')
                   ->sum('amount');

        // ===== VISITOR DAILY TREND =====
        $visitorTrend = Visitor::selectRaw("DATE(check_in) as date, COUNT(*) as total")
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // ===== CHART DATA =====
        $chartLabels = ['Societies', 'Phases', 'Wings', 'Flats', 'Securities', 'Events'];

        $chartData = [
            $societiesCount,
            $phasesCount,
            $wingsCount,
            $flatsCount,
            $securitiesCount,
            $eventsCount,
        ];

        // ===== MAINTENANCE MONTHLY GRAPH =====
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

        // ===== RETURN VIEW =====
        return view('owner.dashboard', compact(
            'societiesCount',
            'phasesCount',
            'wingsCount',
            'flatsCount',
            'securitiesCount',
            'eventsCount',
            'totalMaintenance',
            'latestNotices',
            'totalVisitors',
            'totalAmenities',
            'todayAttendance',
            'myBookings',
            'totalBookings',
             'totalParking',
            'parkedVehicles',
            'exitedVehicles',
              'myTotalBills',
            'myPaidBills',
            'myPendingBills',
            'myDueAmount' ,
            'chartLabels',
            'chartData',
            'months',
            'counts',
            'visitorTrend'
        ));
    }
}
