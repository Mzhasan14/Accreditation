<?php

namespace App\Http\Controllers;

use App\Models\AccreditationComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'entry_id' => 'required|exists:accreditation_entries,id',
            'comment' => 'required|string'
        ]);

        AccreditationComment::create([
            'entry_id' => $request->entry_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Comment added.');
    }
}
