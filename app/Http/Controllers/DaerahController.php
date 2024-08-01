<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    /**
     * Menampilkan daftar daerah.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $daerahs = Daerah::withCount('calons')
            ->orderBy('nama')
            ->paginate(15);

        return view('daerah.index', compact('daerahs'));
    }

    /**
     * Menampilkan detail daerah tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $daerah = Daerah::with(['calons' => function ($query) {
            $query->orderBy('nama');
        }])->findOrFail($id);

        return view('daerah.show', compact('daerah'));
    }

    /**
     * Mencari daerah berdasarkan nama.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $daerahs = Daerah::where('nama', 'like', "%{$query}%")
            ->withCount('calons')
            ->orderBy('nama')
            ->paginate(15);

        return view('daerah.index', compact('daerahs', 'query'));
    }
}
