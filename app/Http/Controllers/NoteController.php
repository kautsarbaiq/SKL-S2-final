<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Auth::user()->notes()->latest()->get();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Auth::user()->notes()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index')
            ->with('success', 'Catatan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        $this->checkOwnership($note);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $this->checkOwnership($note);
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $this->checkOwnership($note);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index')
            ->with('success', 'Catatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $this->checkOwnership($note);
        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Catatan berhasil dihapus!');
    }

    /**
     * Check if the authenticated user owns the note.
     */
    private function checkOwnership(Note $note)
    {
        if (Auth::id() !== $note->user_id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
