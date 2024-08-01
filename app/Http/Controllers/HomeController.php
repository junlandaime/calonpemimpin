<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon;
use App\Models\Daerah;
use App\Models\Berita;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil calon-calon terkemuka (misalnya 3 calon teratas)
        $featuredCalons = Calon::with('daerah')
            ->inRandomOrder()
            ->take(3)
            ->get();

        // Mengambil daftar daerah untuk quick links
        $daerahs = Daerah::withCount('calons')
            ->orderBy('nama')
            ->take(5)
            ->get();

        // Mengambil berita terkini
        // $latestNews = Berita::latest()
        //     ->take(3)
        //     ->get();

        // Statistik singkat
        $totalCalons = Calon::count();
        $totalDaerahs = Daerah::count();

        return view('home', compact(
            'featuredCalons',
            'daerahs',
            // 'latestNews',
            'totalCalons',
            'totalDaerahs'
        ));
    }

    /**
     * Menampilkan halaman pencarian.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $calons = Calon::where('nama', 'like', "%{$query}%")
            ->orWhere('visi', 'like', "%{$query}%")
            ->orWhere('misi', 'like', "%{$query}%")
            ->orWhereHas('daerah', function ($q) use ($query) {
                $q->where('nama', 'like', "%{$query}%");
            })
            ->paginate(10);

        return view('search-results', compact('calons', 'query'));
    }

    /**
     * Menampilkan halaman tentang kami.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('tentang-kami');
    }

    /**
     * Menampilkan halaman kontak.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('kontak-kami');
    }

    public function infografis()
    {
        $totalCalon = Calon::count();
        $jumlahDaerah = Daerah::count();

        return view('infografis', compact(

            'totalCalon',
            'jumlahDaerah'
        ));
    }

    public function jadwal()
    {
        return view('jadwal');
    }

    public function pelajari()
    {
        return view('pelajari');
    }
}
