<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /* -----------------------------
       Helper: role check
    ------------------------------*/
    private function canEdit()
    {
        return in_array(Auth::user()->role, ['admin', 'owner']);
    }

    /* -----------------------------
       INDEX – All roles (Admin, Owner, Security)
    ------------------------------*/
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    /* -----------------------------
       CREATE – Admin & Owner only
    ------------------------------*/
    public function create()
    {
        if (!$this->canEdit()) {
            abort(403, 'Unauthorized');
        }

        return view('events.create');
    }

    /* -----------------------------
       STORE – Admin & Owner only
    ------------------------------*/
    public function store(Request $request)
    {
        if (!$this->canEdit()) {
            abort(403, 'Unauthorized');
        }

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'event_date'  => 'required|date',
            'event_time'  => 'required',
            'venue'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('events', 'public');
        }

        $data['created_by'] = Auth::id();

        Event::create($data);

        return redirect()->route(auth()->user()->role === 'admin'
            ? 'admin.events.index'
            : 'owner.events.index'
            )->with('success', 'Event added successfully');

    }

    /* -----------------------------
       SHOW – All roles (View only)
    ------------------------------*/
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /* -----------------------------
       EDIT – Admin & Owner only
    ------------------------------*/
    public function edit(Event $event)
    {
        if (!$this->canEdit()) {
            abort(403, 'Unauthorized');
        }

        return view('events.edit', compact('event'));
    }

    /* -----------------------------
       UPDATE – Admin & Owner only
    ------------------------------*/
    public function update(Request $request, Event $event)
    {
        if (!$this->canEdit()) {
            abort(403, 'Unauthorized');
        }

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'event_date'  => 'required|date',
            'event_time'  => 'required',
            'venue'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {

            // delete old photo
            if ($event->photo && Storage::disk('public')->exists($event->photo)) {
                Storage::disk('public')->delete($event->photo);
            }

            $data['photo'] = $request->file('photo')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route(auth()->user()->role === 'admin'
                  ? 'admin.events.index'
                 : 'owner.events.index'
            )->with('success', 'Event updated successfully');

    }

    /* -----------------------------
       DELETE – Admin & Owner only
    ------------------------------*/
    public function destroy(Event $event)
    {
        if (!$this->canEdit()) {
            abort(403, 'Unauthorized');
        }

        if ($event->photo && Storage::disk('public')->exists($event->photo)) {
            Storage::disk('public')->delete($event->photo);
        }

        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully');
    }
}
