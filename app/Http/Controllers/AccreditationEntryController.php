<?php

namespace App\Http\Controllers;

use App\Models\AccreditationEntry;
use App\Models\AccreditationSection;
use App\Models\Criteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccreditationEntryController extends Controller
{
    public function index($criteriaId)
    {
        $criteria = Criteria::with('sections.entries')->findOrFail($criteriaId);

        $entries = AccreditationEntry::whereHas('section', function ($query) use ($criteriaId) {
            $query->where('criteria_id', $criteriaId);
        })->where('admin_id', Auth::id())->get();

        return view('admin.accreditation.entries.index', compact('entries', 'criteria'));
    }

    public function create($criteriaId)
    {
        $sections = AccreditationSection::where('criteria_id', $criteriaId)->get();
        $criteria = Criteria::findOrFail($criteriaId);

        return view('admin.accreditation.entries.create', compact('sections', 'criteria'));
    }

    public function store(Request $request, $criteriaId)
    {
        try {
            $validated = $request->validate([
                'descriptions' => 'required|array',
                'descriptions.*' => 'required|string',
                'links' => 'nullable|array',
                'links.*' => 'nullable|url',
                'photos' => 'nullable|array',
                'photos.*' => 'nullable|image|max:2048'
            ]);

            foreach ($request->descriptions as $sectionId => $description) {
                $link = $request->links[$sectionId] ?? null;
                $title = $request->titles[$sectionId] ?? '-';
                $photo = $request->file('photos')[$sectionId] ?? null;
                $photoPath = $photo ? $photo->store('accreditation_photos', 'public') : null;

                AccreditationEntry::create([
                    'section_id' => $sectionId,
                    'admin_id' => Auth::id(),
                    'description' => $description,
                    'link' => $link,
                    'photo_path' => $photoPath,
                    'status' => 'draft'
                ]);
            }

            return redirect()->route('entries.by.criteria', ['criteria' => $criteriaId])
                ->with('success', 'Semua entri berhasil disimpan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan entri.')->withInput();
        }
    }

    public function edit(AccreditationEntry $entry)
    {
        $sections = AccreditationSection::where('criteria_id', $entry->section->criteria_id)->get();
        $comment = optional($entry->validations()->latest()->first())->comments;

        return view('admin.accreditation.entries.edit', compact('entry', 'sections', 'comment'));
    }

    public function update(Request $request, AccreditationEntry $entry)
    {
        $request->validate([
            'section_id' => 'required',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'photo' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $entry->photo_path = $request->file('photo')->store('accreditation_photos', 'public');
        }

        $entry->update([
            'section_id' => $request->section_id,
            'description' => $request->description,
            'link' => $request->link,
            'photo_path' => $entry->photo_path
        ]);

        return redirect()->route('entries.by.criteria', ['criteria' => $entry->section->criteria_id])
            ->with('success', 'Entry berhasil diperbarui.');
    }

    public function submit(AccreditationEntry $entry)
    {
        $entry->update(['status' => 'submitted']);
        return redirect()->back()->with('success', 'Entry berhasil dikirim untuk validasi.');
    }

    public function destroy(AccreditationEntry $entry)
    {
        $criteriaId = $entry->section->criteria_id;
        $entry->delete();

        return redirect()->route('entries.by.criteria', ['criteria' => $criteriaId])
            ->with('success', 'Entry berhasil dihapus.');
    }
}
