<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;

class ParkingController extends Controller
{
    // 🔹 SHOW LIST
    public function index()
    {
        $parkings = Parking::latest()->get();
        return view('parkings.index', compact('parkings'));
    }

    // 🔹 CREATE PAGE
    public function create()
    {
        return view('parkings.create');
    }

    // 🔹 STORE VEHICLE ENTRY
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_number' => 'required',
            'owner_name' => 'required',
            'vehicle_type' => 'required',
        ]);

        $slot = 'SLOT-' . rand(1, 100);

        Parking::create([
            'vehicle_number' => $request->vehicle_number,
            'owner_name' => $request->owner_name,
            'vehicle_type' => $request->vehicle_type,
            'slot_number' => $slot,
            'entry_time' => now(),
            'status' => 'Parked'
        ]);

        return redirect()->back()
            ->with('success', 'Vehicle Parked Successfully');
    }

    // 🔹 EDIT PAGE
    public function edit(Parking $parking)
    {
        return view('parkings.edit', compact('parking'));
    }

    // 🔹 UPDATE PARKING
    public function update(Request $request, Parking $parking)
    {
        $request->validate([
            'vehicle_number' => 'required',
            'owner_name' => 'required',
            'vehicle_type' => 'required',
            'slot_number' => 'required',
        ]);

        $parking->update([
            'vehicle_number' => $request->vehicle_number,
            'owner_name' => $request->owner_name,
            'vehicle_type' => $request->vehicle_type,
            'slot_number' => $request->slot_number,
        ]);

        return redirect()->back()
            ->with('success', 'Parking Updated');
    }

    // 🔹 DELETE PARKING
    public function destroy(Parking $parking)
    {
        $parking->delete();

        return redirect()->back()
            ->with('success', 'Parking Deleted');
    }

    // 🔹 VEHICLE EXIT SYSTEM + CHARGES
    public function exit($id)
    {
        $parking = Parking::findOrFail($id);

        $entry = strtotime($parking->entry_time);
        $exit = time();

        $hours = ceil(($exit - $entry) / 3600);

        if ($parking->vehicle_type == '2 Wheeler')
            $rate = 10;
        elseif ($parking->vehicle_type == 'Cycle')
            $rate = 5;
        else
            $rate = 30;

        $charges = $hours * $rate;

        $parking->update([
            'exit_time' => now(),
            'status' => 'Exited',
            'charges' => $charges
        ]);

        return redirect()->back()
            ->with('success', 'Vehicle Exited. Charges ₹'.$charges);
    }
}
