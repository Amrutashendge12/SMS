<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    // 🟢 Show all notices (Admin + Owner + Security)
    public function index()
    {
        $notices = Notice::latest()->get();
        return view('notices.index', compact('notices'));
    }

    // 🟢 Show add form (Admin only)
    public function create()
    {
        return view('notices.create');
    }

    // 🟢 Store notice
    public function store(Request $request)
    {
        Notice::create($request->all());
        return redirect()->route('admin.notices.index')->with('success','Notice added successfully!');
    }

    // 🟢 Show edit form
    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice'));
    }

    // 🟢 Update notice
    public function update(Request $request, Notice $notice)
    {
        $notice->update($request->all());
        return redirect()->route('admin.notices.index')->with('success','Notice updated!');
    }

    // 🟢 Delete notice
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return back()->with('success','Notice deleted!');
    }
}
