<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Outlet;
use App\Models\transaksi;

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
        $transaksi = User::all();
        $yax = User::select('role');

        $kategori = [];
        foreach ($transaksi as $transak) {
            $kategori[] = $transak->name;
            // $y[] = $transak->role;
        }
        // dd($transaksi->where('role', 'member')->count(), $transaksi->where('role', 'kasir')->count());
        return view('dashboard.dash', compact('pengguna', 'outlet', 'kategori', 'transaksi'));
    }
}
