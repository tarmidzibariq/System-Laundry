<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Outlet;
use App\Models\Paket;
class TransaksiController extends Controller
{
    public function create()
    {
        $outlet = Outlet::all();
        return view('order.createorder', compact('outlet'));
    }
}
