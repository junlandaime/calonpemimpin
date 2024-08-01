<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminDaerahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'admin']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daerahs = Daerah::orderBy('nama')->paginate(15);
        return view('admin.daerah.index', compact('daerahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daerah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:daerahs',
            'jenis' => 'required|in:kabupaten,kota',
            'provinsi' => 'required|max:255',
            'luas_wilayah' => 'required|numeric',
            'jumlah_penduduk' => 'required|integer',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['nama']);

        Daerah::create($validatedData);

        return redirect()->route('admin.daerah.index')
            ->with('success', 'Daerah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function show(Daerah $daerah)
    {
        return view('admin.daerah.show', compact('daerah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function edit(Daerah $daerah)
    {
        return view('admin.daerah.edit', compact('daerah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daerah $daerah)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:daerahs,nama,' . $daerah->id,
            'jenis' => 'required|in:kabupaten,kota',
            'provinsi' => 'required|max:255',
            'luas_wilayah' => 'required|numeric',
            'jumlah_penduduk' => 'required|integer',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['nama']);

        $daerah->update($validatedData);

        return redirect()->route('admin.daerah.index')
            ->with('success', 'Daerah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daerah $daerah)
    {
        // Check if there are any associated calons
        if ($daerah->calons()->count() > 0) {
            return redirect()->route('admin.daerah.index')
                ->with('error', 'Daerah tidak dapat dihapus karena masih memiliki calon terkait.');
        }

        $daerah->delete();

        return redirect()->route('admin.daerah.index')
            ->with('success', 'Daerah berhasil dihapus.');
    }

    /**
     * Search for daerah.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $daerahs = Daerah::where('nama', 'LIKE', "%{$search}%")
            ->orWhere('jenis', 'LIKE', "%{$search}%")
            ->orWhere('provinsi', 'LIKE', "%{$search}%")
            ->orderBy('nama')
            ->paginate(15);

        return view('admin.daerah.index', compact('daerahs', 'search'));
    }
}
