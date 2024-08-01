<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Daerah;
use Illuminate\Http\Request;

class CalonController extends Controller
{
    public function index()
    {
        $calons = Calon::with('daerah')->paginate(12);
        // Mengambil calon-calon terkemuka (misalnya 3 calon teratas)
        $featuredCalons = Calon::with('daerah')
            ->inRandomOrder()
            ->take(9)
            ->get();
        return view('calon.index', compact('calons', 'featuredCalons'));
    }

    public function daftarDaerah()
    {
        $daerahs = Daerah::withCount('calons')->get();
        return view('calon.daftar-daerah', compact('daerahs'));
    }

    public function daftarCalon(Request $request)
    {
        $query = Calon::query();

        if ($request->has('daerah')) {
            $query->where('daerah_id', $request->daerah);
        }

        if ($request->has('partai')) {
            $query->where('partai', $request->partai);
        }

        $calons = $query->with('daerah')->paginate(12);
        $daerahs = Daerah::all();
        $partais = Calon::distinct('partai')->pluck('partai');

        return view('calon.daftar-calon', compact('calons', 'daerahs', 'partais'));
    }

    public function profilSingkat($id)
    {
        $calon = Calon::with('daerah')->findOrFail($id);
        return view('calon.profil-singkat', compact('calon'));
    }

    public function profilLengkap($id)
    {
        $calon = Calon::with(['daerah', 'komentar'])->findOrFail($id);
        return view('calon.profil-lengkap', compact('calon'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $calons = Calon::where('nama', 'like', "%$query%")
            ->orWhere('visi', 'like', "%$query%")
            ->orWhere('misi', 'like', "%$query%")
            ->paginate(12);

        return view('calon.search-results', compact('calons', 'query'));
    }

    public function addKomentar(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'komentar' => 'required',
        ]);

        $calon = Calon::findOrFail($id);
        $calon->komentar()->create([
            'nama' => $request->nama,
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    // Metode tambahan untuk admin (opsional, tergantung kebutuhan)
    public function create()
    {
        $daerahs = Daerah::all();
        return view('admin.calon.create', compact('daerahs'));
    }

    public function store(Request $request)
    {
        // Validasi dan penyimpanan data calon baru
    }

    public function edit($id)
    {
        $calon = Calon::findOrFail($id);
        $daerahs = Daerah::all();
        return view('admin.calon.edit', compact('calon', 'daerahs'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data calon
    }

    public function destroy($id)
    {
        $calon = Calon::findOrFail($id);
        $calon->delete();
        return redirect()->route('admin.calon.index')->with('success', 'Calon berhasil dihapus.');
    }
}
