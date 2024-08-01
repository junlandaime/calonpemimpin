<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Daerah;
use Illuminate\Http\Request;

class AdminCalonController extends Controller
{
    public function index()
    {
        $calons = Calon::with('daerah')->paginate(15);
        return view('admin.calon.index', compact('calons'));
    }

    /**
     * Show the form for creating a new candidate.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $daerahs = Daerah::all();
        return view('admin.calon.create', compact('daerahs'));
    }

    /**
     * Store a newly created candidate in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'daerah_id' => 'required|exists:daerahs,id',
            'visi' => 'required',
            'misi' => 'required',
            // Add other validation rules as needed
        ]);

        Calon::create($validatedData);

        return redirect()->route('admin.calon.index')->with('success', 'Calon berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified candidate.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $calon = Calon::findOrFail($id);
        $daerahs = Daerah::all();
        return view('admin.calon.edit', compact('calon', 'daerahs'));
    }

    /**
     * Update the specified candidate in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $calon = Calon::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'daerah_id' => 'required|exists:daerahs,id',
            'visi' => 'required',
            'misi' => 'required',
            // Add other validation rules as needed
        ]);

        $calon->update($validatedData);

        return redirect()->route('admin.calon.index')->with('success', 'Calon berhasil diperbarui.');
    }

    /**
     * Remove the specified candidate from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $calon = Calon::findOrFail($id);
        $calon->delete();

        return redirect()->route('admin.calon.index')->with('success', 'Calon berhasil dihapus.');
    }
}
