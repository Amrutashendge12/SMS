<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\User;

class BillController extends Controller
{
    // Show all bills (Admin + Owner)
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'owner') {
            $bills = Bill::where('user_id', $user->id)->get();
        } else {
            $bills = Bill::all();
        }

        return view('bills.index', compact('bills'));
    }

    // Show create form
    public function create()
    {
        $billTypes = [
            'Maintenance',
            'Light Bill',
            'Pool Charges',
            'Water Bill',
            'Cricket Ground',
            'Parking',
            'Seminar Hall',
            'Club House'
        ];

        $owners = User::where('role', 'owner')->get();

        return view('bills.create', compact('billTypes', 'owners'));
    }

    // Save bill
    public function store(Request $request)
    {
        Bill::create([
           'user_id' => $request->user_id,   // DYNAMIC OWNER ID
        'user_role' => 'owner',
        'bill_type' => $request->bill_type,
        'amount' => $request->amount,
        'status' => 'Pending',
        'due_date' => $request->due_date
        ]);

        return redirect()->route('admin.bills.index')
            ->with('success', 'Bill Created Successfully!');
    }

    // Pay bill (OWNER)
    public function pay($id)
    {
        $bill = Bill::findOrFail($id);

        // Only owner can pay own bill
        if ($bill->user_id == auth()->id()) {
            $bill->status = 'Paid';
            $bill->save();
        }

        return redirect()->route('owner.bills.index')
            ->with('success', 'Bill Paid Successfully!');
    }

    // Owner Bills Page
    public function ownerBills()
    {
        $bills = Bill::where('user_id', auth()->id())->get();

        return view('owner.bills.index', compact('bills'));
    }
}
