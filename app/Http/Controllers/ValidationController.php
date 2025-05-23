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

        // Ambil entri yang belum divalidasi sesuai level
        $entries = AccreditationEntry::where('status', $status)
            ->with('section.criteria')
            ->get();

        // Ambil ID kriteria yang punya entri dengan status sesuai
        $criteriaIds = $entries->pluck('section.criteria.id')->unique();

        // Filter kriteria yang hanya punya entri untuk divalidasi
        $criteriaList = Criteria::whereIn('id', $criteriaIds)->get();

        return view('validator.validation.index', [
            'entries' => $entries,
            'level' => $level,
            'criteriaList' => $criteriaList
        ]);
    }

    public function indexByCriteria($criteriaId)
    {
        $level = Auth::user()->role === 'validator1' ? 1 : 2;
        $status = $level === 1 ? 'submitted' : 'approved_lvl1';

        // Ambil entri dengan kriteria yang dimaksud dan status yang sesuai
        $entries = AccreditationEntry::where('status', $status)
            ->whereHas('section', function ($query) use ($criteriaId) {
                $query->where('criteria_id', $criteriaId);
            })
            ->with('section.criteria')
            ->get();

        // Ambil kriteria lain yang masih perlu divalidasi
        $allEntries = AccreditationEntry::where('status', $status)
            ->with('section.criteria')->get();

        $criteriaIds = $allEntries->pluck('section.criteria.id')->unique();
        $criteriaList = Criteria::whereIn('id', $criteriaIds)->get();

        return view('validator.validation.index', [
            'entries' => $entries,
            'level' => $level,
            'criteriaList' => $criteriaList
        ]);
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

        // Ambil level dan status target berikutnya
        $status = $level === 1 ? 'submitted' : 'approved_lvl1';

        // Cek apakah masih ada entri lain yang butuh divalidasi
        $remaining = AccreditationEntry::where('status', $status)->exists();

        if ($remaining) {
            return redirect()->route('validation.index')->with('success', 'Validation recorded.');
        } else {
            return redirect()->route('dashboard_validator')->with('success', 'Validation recorded. Semua entri telah divalidasi.');
        }
    }
}
