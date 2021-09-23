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
        $outlet = Outlet::pluck('nama', 'id');
        return view('order.createorder', compact('outlet'));
    }

    public function getPaket(Request $request)
    {
        $cid = $request->post('cid');
        $paket = Paket::where('id_outlet', $cid)->get();
        $html = '<option value="">Pilih satu</option>';
        foreach ($paket as $list) {
            $html .=  '<option value="' . $list->id . '">' . $list->nama_paket . '</option>';
        }
        return $html;
    }
    public function getHarga(Request $request)
    {
        $cid = $request->post('cid');
        $paket = Paket::where('id', $cid)->get();
        $html = ' ';
        foreach ($paket as $list) {
            $html .=  '<input type="number" class="form-control mb-4" id="harga" name="harga" value="' . $list->harga . '">';
        }
        return $html;
    }
}
