<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::whereHas('security', function ($q) {
                $q->whereHas('society', function ($s) {
                    $s->where('owner_id', auth()->id());
                });
            })
            ->with('security')
            ->orderBy('date', 'desc')
            ->get();

        return view('owner.attendance.index', compact('attendances'));
    }
}

