<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    // 🔹 LIST (READ)
    public function index()
    {
        // member = owner
        $members = User::where('role', 'owner')->get();
        return view('admin.member.index', compact('members'));
    }

    // 🔹 CREATE FORM
    public function create()
    {
        $flats = Flat::with('wing.phase.society')->get();
        return view('admin.member.create', compact('flats'));
    }

    // 🔹 STORE (CREATE)
public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'mobile'   => 'required',
        'password' => 'required|confirmed|min:6',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // ✅ PHOTO UPLOAD
    $photoPath = null;
    if ($request->hasFile('profile_photo')) {
        $photoPath = $request->file('profile_photo')
                             ->store('profiles', 'public');
    }

    // 🔥 MEMBER CREATE → OWNER ROLE
    $member = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'password' => Hash::make($request->password),
        'role' => 'owner',

        'total_family_members' => $request->total_family_members,
        'total_children' => $request->total_children,
        'boys' => $request->boys,
        'girls' => $request->girls,
        'old_people' => $request->old_people,
        'occupation' => $request->occupation,
        'address' => $request->address,
        'profile_photo' => $photoPath, // ✅ CORRECT
    ]);

    // flat assign (optional)
    if ($request->flat_id) {
        Flat::where('id', $request->flat_id)
            ->update(['owner_id' => $member->id]);
    }

    return redirect()->route('admin.member.index')
                     ->with('success', 'Member created successfully');
}

    // 🔹 EDIT FORM
    public function edit(User $member)
    {
        $flats = Flat::with('wing.phase.society')->get();
        return view('admin.member.edit', compact('member', 'flats'));
    }

    public function show(User $member)
    {
        return view('admin.member.show', compact('member'));
    }

    // 🔹 UPDATE
    public function update(Request $request, User $member)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $member->id,
            'mobile'=> 'required',
        ]);

        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'total_family_members' => $request->total_family_members,
            'total_children' => $request->total_children,
            'boys' => $request->boys,
            'girls' => $request->girls,
            'old_people' => $request->old_people,
            'occupation' => $request->occupation,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.member.index')
                         ->with('success', 'Member updated successfully');
    }

    // 🔹 DELETE
    public function destroy(User $member)
    {
        $member->delete();

        return redirect()->route('admin.member.index')
                         ->with('success', 'Member deleted successfully');
    }
}
