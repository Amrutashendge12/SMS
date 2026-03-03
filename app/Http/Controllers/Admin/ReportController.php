<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Maintenance;
use App\Models\Bill;
use App\Models\Complaint;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalMaintenances = Maintenance::count();

        $totalBills = Bill::count();
        $paidBills = Bill::where('status','paid')->count();
        $pendingBills = Bill::where('status','pending')->count();
        $totalCollection = Bill::where('status','paid')->sum('amount');

        $totalComplaints = Complaint::count();
        $openComplaints = Complaint::where('status','open')->count();
        $closedComplaints = Complaint::where('status','closed')->count();

        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', today())->count();

        return view('admin.reports.index', compact(
            'totalEvents',
            'totalMaintenances',
            'totalBills',
            'paidBills',
            'pendingBills',
            'totalCollection',
            'totalComplaints',
            'openComplaints',
            'closedComplaints',
            'totalVisitors',
            'todayVisitors'
        ));
    }

    public function downloadPdf()
    {
        $totalEvents = Event::count();
        $totalMaintenances = Maintenance::count();

        $totalBills = Bill::count();
        $paidBills = Bill::where('status','paid')->count();
        $pendingBills = Bill::where('status','pending')->count();
        $totalCollection = Bill::where('status','paid')->sum('amount');

        $totalComplaints = Complaint::count();
        $openComplaints = Complaint::where('status','open')->count();
        $closedComplaints = Complaint::where('status','closed')->count();

        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', today())->count();

        $pdf = Pdf::loadView('admin.reports.pdf', compact(
            'totalEvents',
            'totalMaintenances',
            'totalBills',
            'paidBills',
            'pendingBills',
            'totalCollection',
            'totalComplaints',
            'openComplaints',
            'closedComplaints',
            'totalVisitors',
            'todayVisitors'
        ));

        return $pdf->download('society-report.pdf');
    }
}