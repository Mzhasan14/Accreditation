<?php

namespace App\Http\Controllers;

use App\Models\AccreditationEntry;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Criteria;

class ValidationController extends Controller
{
    // Default list (tanpa filter criteria)
    public function index()
    {
        $level = Auth::user()->role === 'validator1' ? 1 : 2;
        $status = $level === 1 ? 'submitted' : 'approved_lvl1';

        $entries = AccreditationEntry::where('status', $status)
            ->with('section.criteria')
            ->get();

        $criteriaList = Criteria::all(); // ambil semua criteria

        return view('validator.validation.index', compact('entries', 'level', 'criteriaList'));
    }

    public function indexByCriteria($criteriaId)
    {
        $level = Auth::user()->role === 'validator1' ? 1 : 2;
        $status = $level === 1 ? 'submitted' : 'approved_lvl1';

        $entries = AccreditationEntry::where('status', $status)
            ->whereHas('section', function ($query) use ($criteriaId) {
                $query->where('criteria_id', $criteriaId);
            })
            ->with('section.criteria')
            ->get();

        $criteriaList = Criteria::all();

        return view('validator.validation.index', compact('entries', 'level', 'criteriaList'));
    }

    public function show(AccreditationEntry $entry)
    {
        return view('validator.validation.show', compact('entry'));
    }

    public function validateEntry(Request $request, AccreditationEntry $entry)
    {
        $level = Auth::user()->role === 'validator1' ? 1 : 2;

        $request->validate([
            'status' => 'required|in:accepted,revised,rejected',
            'comments' => 'nullable|string'
        ]);

        Validation::create([
            'entry_id' => $entry->id,
            'validator_id' => Auth::id(),
            'level' => $level,
            'status' => $request->status,
            'comments' => $request->comments,
            'validated_at' => now()
        ]);

        if ($request->status === 'accepted') {
            $entry->update([
                'status' => $level === 1 ? 'approved_lvl1' : 'approved_lvl2'
            ]);
        } elseif ($request->status === 'revised') {
            $entry->update([
                'status' => 'revised'
            ]);
        } elseif ($request->status === 'rejected') {
            $entry->update([
                'status' => 'rejected'
            ]);
        }

        return redirect()->route('validation.index')->with('success', 'Validation recorded.');
    }
}
