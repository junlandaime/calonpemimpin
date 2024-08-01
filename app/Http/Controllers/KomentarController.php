<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Calon;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    /**
     * Menyimpan komentar baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $calonId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $calonId)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'komentar' => 'required|max:1000',
        ]);

        $calon = Calon::findOrFail($calonId);

        $komentar = new Komentar([
            'nama' => $request->nama,
            'komentar' => $request->komentar,
            'status' => 'pending', // Opsional: untuk sistem moderasi
        ]);

        $calon->komentar()->save($komentar);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan dan sedang menunggu moderasi.');
    }

    /**
     * Mengubah status komentar (untuk moderasi).
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus($id, Request $request)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->status = $request->status;
        $komentar->save();

        return redirect()->back()->with('success', 'Status komentar berhasil diperbarui.');
    }

    /**
     * Menghapus komentar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
