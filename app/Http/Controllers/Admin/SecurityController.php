<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Security;
use App\Models\User;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

            // 🔴 Find Logged-in Admin Society
            $society = Society::where('owner_id', auth()->id())->first();

            if (!$society) {
                abort(404, 'Please create society first.');
            }

            // 1️⃣ Create Login User
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
                'role'     => 'security',
            ]);

            // 2️⃣ Upload Photo
            if ($request->hasFile('photo')) {
                $data['photo'] = $request->file('photo')
                    ->store('security/photos', 'public');
            }

            // 3️⃣ Upload ID Proof
            if ($request->hasFile('id_proof')) {
                $data['id_proof'] = $request->file('id_proof')
                    ->store('security/idproofs', 'public');
            }

            // 4️⃣ Create Security Profile
            Security::create([
                'society_id' => $society->id,
                'user_id'    => $user->id,
                'name'       => $data['name'],
                'email'      => $data['email'],
                'mobile'     => $data['mobile'],
                'shift'      => $data['shift'] ?? null,
                'photo'      => $data['photo'] ?? null,
                'id_proof'   => $data['id_proof'] ?? null,
                'password'   => $user->password,
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
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ]);

        $security->update($request->all());

        return redirect()->route('admin.securities.index')
            ->with('success', 'Security updated successfully');
    }
    public function destroy(Security $security)
    {
        $security->delete();
        return back()->with('success', 'Security deleted');
    }
}
