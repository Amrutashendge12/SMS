<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    // Attendance list
    public function index()
    {
        $attendances = Attendance::where('security_id', auth()->id())
            ->orderBy('date', 'desc')
            ->get();

        return view('security.attendance.index', compact('attendances'));
    }

    // Show mark attendance page
    public function create()
    {
        $today = Carbon::today();

        $alreadyMarked = Attendance::where('security_id', auth()->id())
            ->whereDate('date', $today)
            ->exists();

        if ($alreadyMarked) {
            return redirect()
                ->route('security.attendance.index')
                ->with('error', 'Today attendance already marked');
        }

        return view('security.attendance.create');
    }

    // Store attendance (8 hours auto)
    public function store()
    {
        $today = Carbon::today();

        $exists = Attendance::where('security_id', auth()->id())
            ->whereDate('date', $today)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Attendance already marked for today');
        }

        $inTime  = Carbon::now();
        $outTime = $inTime->copy()->addHours(8);

        Attendance::create([
            'security_id' => auth()->id(),
            'date'        => $today,
            'in_time'     => $inTime->format('H:i:s'),
            'out_time'    => $outTime->format('H:i:s'),
        ]);

        return redirect()
            ->route('security.attendance.index')
            ->with('success', 'Attendance marked successfully (8 hours)');
    }
}
