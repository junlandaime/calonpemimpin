<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon;
use App\Models\Daerah;
use App\Models\Komentar;
use App\Models\User;

class AdminController extends Controller
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
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $totalCalons = Calon::count();
        $totalDaerahs = Daerah::count();
        $totalKomentars = Komentar::count();
        $totalUsers = User::count();

        $recentCalons = Calon::latest()->take(5)->get();
        $pendingKomentars = Komentar::where('status', 'pending')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalCalons',
            'totalDaerahs',
            'totalKomentars',
            'totalUsers',
            'recentCalons',
            'pendingKomentars'
        ));
    }

    /**
     * Show the list of candidates.
     *
     * @return \Illuminate\View\View
     */


    /**
     * Show the list of regions.
     *
     * @return \Illuminate\View\View
     */
    public function daerahIndex()
    {
        $daerahs = Daerah::paginate(15);
        return view('admin.daerah.index', compact('daerahs'));
    }

    // Add other methods for managing daerah (create, store, edit, update, destroy) similar to calon methods

    /**
     * Show the list of comments for moderation.
     *
     * @return \Illuminate\View\View
     */
    public function komentarIndex()
    {
        $komentars = Komentar::with('calon')->where('status', 'pending')->paginate(20);
        return view('admin.komentar.index', compact('komentars'));
    }

    /**
     * Approve a comment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function komentarApprove($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->status = 'approved';
        $komentar->save();

        return redirect()->back()->with('success', 'Komentar berhasil disetujui.');
    }

    /**
     * Reject a comment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function komentarReject($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->status = 'rejected';
        $komentar->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditolak.');
    }
}
