<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    /* ============================================================
       ROLE CHECK HELPERS
    ============================================================ */

    private function isAdmin()
    {
        return Auth::user()->role === 'admin';
    }

    private function isOwner()
    {
        return Auth::user()->role === 'owner';
    }

    private function isSecurity()
    {
        return Auth::user()->role === 'security';
    }

    private function canManage()
    {
        return in_array(Auth::user()->role, ['admin', 'owner']);
    }

    /* ============================================================
       INDEX – LIST DATA (Role Based)
    ============================================================ */

   public function index()
{
    if ($this->isAdmin() || $this->isSecurity()) {

        $maintenances = Maintenance::latest()->get();

        // Dashboard Data
        $totalMaintenances = Maintenance::count();
        $totalCollected    = Maintenance::where('status','paid')->sum('amount');
        $totalPending      = Maintenance::where('status','pending')->sum('amount');

    } else {

        // Owner sees only own data
        $maintenances = Maintenance::where('created_by', Auth::id())
            ->latest()
            ->get();

        // Owner Dashboard Data (only his records)
        $totalMaintenances = Maintenance::where('created_by', Auth::id())->count();
        $totalCollected    = Maintenance::where('created_by', Auth::id())
                                ->where('status','paid')->sum('amount');
        $totalPending      = Maintenance::where('created_by', Auth::id())
                                ->where('status','pending')->sum('amount');
    }

    return view('maintenance.index', compact(
        'maintenances',
        'totalMaintenances',
        'totalCollected',
        'totalPending'
    ));
}


    /* ============================================================
       CREATE FORM (Admin + Owner)
    ============================================================ */

    public function create()
    {
        if (!$this->canManage()) {
            abort(403, 'Security cannot add maintenance');
        }

        return view('maintenance.create');
    }

    /* ============================================================
       STORE DATA
    ============================================================ */

    public function store(Request $request)
    {
        if (!$this->canManage()) {
            abort(403);
        }

        $request->validate([
            'society_name' => 'required',
            'phase_name'   => 'required',
            'wing'         => 'required',
            'floor'        => 'required',
            'flat_no'      => 'required',
            'owner_name'   => 'required',
            'amount'       => 'required|numeric',
            'due_date'     => 'required|date',
        ]);

        Maintenance::create([
            'society_name' => $request->society_name,
            'phase_name'   => $request->phase_name,
            'wing'         => $request->wing,
            'floor'        => $request->floor,
            'flat_no'      => $request->flat_no,
            'owner_name'   => $request->owner_name,
            'amount'       => $request->amount,
            'due_date'     => $request->due_date,
            'paid_date'    => $request->paid_date,
            'status'       => $request->status ?? 'pending',
            'payment_mode' => $request->payment_mode,
            'remark'       => $request->remark,
            'created_by'   => Auth::id(),
        ]);

        return redirect()->route('owner.maintenance.index')
            ->with('success', 'Maintenance Added Successfully');
    }

    /* ============================================================
       EDIT FORM
    ============================================================ */

    public function edit($id)
    {
        $maintenance = Maintenance::findOrFail($id);

        if ($this->isOwner() && $maintenance->created_by != Auth::id()) {
            abort(403);
        }

        if ($this->isSecurity()) {
            abort(403);
        }

        return view('maintenance.edit', compact('maintenance'));
    }

    /* ============================================================
       UPDATE DATA
    ============================================================ */

    public function update(Request $request, $id)
    {
        $maintenance = Maintenance::findOrFail($id);

        if ($this->isOwner() && $maintenance->created_by != Auth::id()) {
            abort(403);
        }

        if ($this->isSecurity()) {
            abort(403);
        }

        $request->validate([
            'amount'   => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        $maintenance->update([
            'society_name' => $request->society_name,
            'phase_name'   => $request->phase_name,
            'wing'         => $request->wing,
            'floor'        => $request->floor,
            'flat_no'      => $request->flat_no,
            'owner_name'   => $request->owner_name,
            'amount'       => $request->amount,
            'due_date'     => $request->due_date,
            'paid_date'    => $request->paid_date,
            'status'       => $request->status,
            'payment_mode' => $request->payment_mode,
            'remark'       => $request->remark,
        ]);

        return redirect()->route('owner.maintenance.index')
            ->with('success', 'Maintenance Updated');
    }

    /* ============================================================
       DELETE
    ============================================================ */

    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);

        if ($this->isOwner() && $maintenance->created_by != Auth::id()) {
            abort(403);
        }

        if ($this->isSecurity()) {
            abort(403);
        }

        $maintenance->delete();

        return back()->with('success', 'Deleted Successfully');
    }

    /* ============================================================
       SHOW (Optional)
    ============================================================ */

    public function show($id)
    {
        $maintenance = Maintenance::findOrFail($id);

        if ($this->isOwner() && $maintenance->created_by != Auth::id()) {
            abort(403);
        }

        return view('maintenance.show', compact('maintenance'));
    }

    /* ============================================================
       GRAPH / DASHBOARD DATA
    ============================================================ */

   public function graph()
{
    if ($this->isAdmin() || $this->isSecurity()) {

        $monthlyData = Maintenance::selectRaw('MONTH(due_date) as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

    } else {

        // Owner sees only his data
        $monthlyData = Maintenance::where('created_by', Auth::id())
            ->selectRaw('MONTH(due_date) as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    }

    return view('maintenance.graph', compact('monthlyData'));
}

}
