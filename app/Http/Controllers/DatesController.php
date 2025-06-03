<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dates;

class DatesController extends Controller
{
    public function index()
    {
        $dates = Auth::user()->dates()->orderBy('date', 'asc')->get();
        return view('dates.index', compact('dates'));
    }
    public function create()
    {
        return view('dates.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Auth::user()->dates()->create($request->all());

        return redirect()->route('dates.index')->with('success', 'Date created successfully.');
    }
    public function show(Dates $date)
    {
        if ($date->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('dates.show', compact('date'));
    }
    public function edit(Dates $date)
    {
        if ($date->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('dates.edit', compact('date'));
    }
    public function update(Request $request, Dates $date)
    {
        if ($date->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $date->update($request->all());

        return redirect()->route('dates.index')->with('success', 'Date updated successfully.');
    }
    public function destroy(Dates $date)
    {
        if ($date->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $date->delete();

        return redirect()->route('dates.index')->with('success', 'Date deleted successfully.');
    }
}
