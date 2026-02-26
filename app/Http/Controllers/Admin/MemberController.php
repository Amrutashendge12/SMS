<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Flat;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    // 🔹 LIST MEMBERS
    public function index()
    {
        $members = User::where('role', 'owner')->get();
        return view('admin.member.index', compact('members'));
    }

    // 🔹 CREATE FORM
    public function create()
    {
        $flats = Flat::with('wing.phase.society')->get();

        // Logged-in admin च्या societies
        $societies = Society::where('owner_id', auth()->id())->get();

        return view('admin.member.create', compact('flats','societies'));
    }

    // 🔹 STORE MEMBER
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'mobile'   => 'required',
            'password' => 'required|confirmed|min:6',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

               // Optional family fields
    'father_name' => 'nullable|string|max:255',
    'mother_name' => 'nullable|string|max:255',
    'wife_name' => 'nullable|string|max:255',
    'old_people_name' => 'nullable|string',
    'boy_names' => 'nullable|string',
    'girl_names' => 'nullable|string',
    'guest_name' => 'nullable|string|max:255',

        ]);

        // Upload photo
        $photoPath = null;
        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')
                                 ->store('profiles', 'public');
        }

        // Create Owner (Member)
        $member = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'mobile'     => $request->mobile,
            'password'   => Hash::make($request->password),
            'role'       => 'owner',

            'total_family_members' => $request->total_family_members,
            'total_children'       => $request->total_children,
            'boys'                 => $request->boys,
            'girls'                => $request->girls,
            'old_people'           => $request->old_people,
            'occupation'           => $request->occupation,
            'address'              => $request->address,
            'profile_photo'        => $photoPath,

             // NEW OPTIONAL FIELDS
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'wife_name' => $request->wife_name,
            'old_people_name' => $request->old_people_name,
            'boy_names' => $request->boy_names,
            'girl_names' => $request->girl_names,
            'guest_name' => $request->guest_name,

        ]);

        // Assign flat (if selected)
        if ($request->flat_id) {

            $flat = Flat::with('wing.phase')->findOrFail($request->flat_id);

            // Security Check → Flat belongs to same society?
            if ($flat->wing->phase->society_id != $request->society_id) {
                return back()->withErrors('Flat does not belong to selected society.');
            }

            $flat->update(['owner_id' => $member->id]);
        }

        return redirect()->route('admin.member.index')
            ->with('success', 'Member saved successfully');
    }
    public function edit(User $member)
{
    return view('admin.member.edit', compact('member'));
}

public function show(User $member)
{
    return view('admin.member.show', compact('member'));
}

public function update(Request $request, User $member)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $member->id,
        'mobile' => 'required',
    ]);

    $member->update([
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
    ]);

    return redirect()->route('admin.member.index')
        ->with('success', 'Member updated successfully');
}
public function destroy(User $member)
{
    // remove flat ownership if exists
    Flat::where('owner_id', $member->id)
        ->update(['owner_id' => null]);

    // delete profile photo if exists
    if ($member->profile_photo && file_exists(storage_path('app/public/'.$member->profile_photo))) {
        unlink(storage_path('app/public/'.$member->profile_photo));
    }

    $member->delete();

    return back()->with('success', 'Member deleted successfully');
}

    
}
