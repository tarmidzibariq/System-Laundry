<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Outlet;
use App\Models\Transaksi;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengguna = User::where('role', 'member')->count();
        $outlet = Outlet::count();
        $transaksi = Transaksi::all();
        $yax = Transaksi::select('status');

        $kategori = [];
        foreach ($transaksi as $transak) {
            $kategori[] = $transak->status;
            // $y[] = $transak->role;
        }
        // dd($transaksi);
        // dd($transaksi->where('role', 'member')->count(), $transaksi->where('role', 'kasir')->count());
        return view('dashboard.dash', compact('pengguna', 'outlet', 'kategori', 'transaksi'));
    }
}
