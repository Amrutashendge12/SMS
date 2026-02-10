<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\Security;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class SecurityController extends Controller
{
    public function index()
    {
        $securities = Security::all();
        return view('admin.security.index', compact('securities'));
    }

    public function create()
    {
        return view('admin.security.create');
    }


public function store(Request $request)
{
    $data = $request->validate([
        'name'     => 'required',
        'email'    => 'required|email|unique:users,email',
        'mobile'   => 'required',
        'password' => 'required|min:6',
        'shift'    => 'nullable',
        'photo'    => 'nullable|image|mimes:jpg,jpeg,png',
        'id_proof' => 'nullable|mimes:jpg,jpeg,png,pdf',
    ]);

    DB::transaction(function () use ($request, $data) {

        // 1️⃣ Create USER (LOGIN TABLE)
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'security',
        ]);

        // 2️⃣ File uploads
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('security/photos', 'public');
        }

        if ($request->hasFile('id_proof')) {
            $data['id_proof'] = $request->file('id_proof')
                ->store('security/idproofs', 'public');
        }

        // 3️⃣ Create SECURITY PROFILE
        Security::create([
            'user_id'  => $user->id,
            'name'     => $data['name'],
            'email'    => $data['email'],
            'mobile'   => $data['mobile'],
            'shift'    => $data['shift'] ?? null,
            'photo'    => $data['photo'] ?? null,
            'id_proof' => $data['id_proof'] ?? null,
            'password' => $user->password, // optional
        ]);
    });

    return redirect()
        ->route('admin.securities.index')
        ->with('success', 'Security added & login enabled');
}

 


    public function edit(Security $security)
    {
        return view('admin.security.edit', compact('security'));
    }

    public function update(Request $request, Security $security)
{
    $data = $request->validate([
        'name'   => 'required',
        'mobile' => 'required',
        'shift'  => 'nullable',
        'status' => 'required',
        'photo'  => 'nullable|image|mimes:jpg,jpeg,png',
        'id_proof' => 'nullable|mimes:jpg,jpeg,png,pdf',
    ]);

    // New photo upload
    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')
                                ->store('security/photos', 'public');
    }

    // New ID proof upload
    if ($request->hasFile('id_proof')) {
        $data['id_proof'] = $request->file('id_proof')
                                   ->store('security/idproofs', 'public');
    }

    $security->update($data);

    return redirect()->route('admin.securities.index')
        ->with('success', 'Security updated successfully');
}

public function show(Security $security)
{
    return view('admin.security.show', compact('security'));
}

    public function destroy(Security $security)
    {
        $security->delete();
        return back()->with('success', 'Security deleted');
    }

    public function ownerIndex()
{
    $ownerId = auth()->id();

    $securities = Security::where('owner_id', $ownerId)->get();

    return view('owner.securities.index', compact('securities'));
}

}
