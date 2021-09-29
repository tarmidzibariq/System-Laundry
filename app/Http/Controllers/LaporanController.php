<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = Transaksi::select(
            DB::raw('count(id) as `jumlah`'),
            DB::raw('sum(biaya) as `total`'),
            DB::raw("DATE_FORMAT(tgl, '%Y-%m-%d') as tgl")
        )
            ->groupBy('tgl')->orderBy('tgl')->get();
        $total = Transaksi::sum('biaya');
        // $transaksi = $t
        // dd($transaksi);
        // foreach ($transaksi as $key ) {
        //     echo "$key->tgl"."|"."$key->jumlah";

        //  }
        // $transaksi = Transaksi::where('id')->count();
        // $tanggal = Transaksi::date_format('tgl');
        return view('laporan.index', compact('transaksi','total'));
    }
    public function laporanPDF()
    {
        $transaksi = Transaksi::select(
            DB::raw('count(id) as `jumlah`'),
            DB::raw('sum(biaya) as `total`'),
            DB::raw("DATE_FORMAT(tgl, '%Y-%m-%d') as tgl")
        )
            ->groupBy('tgl')->orderBy('tgl')->get();
        $total = Transaksi::sum('biaya');
        // $transaksi = $t
        // dd($transaksi);
        // foreach ($transaksi as $key ) {
        //     echo "$key->tgl"."|"."$key->jumlah";

        //  }
        // $transaksi = Transaksi::where('id')->count();
        // $tanggal = Transaksi::date_format('tgl');
        $pdf = PDF::loadView('laporan.laporan', compact('transaksi','total'));

        return $pdf->download('Laporan-Penjualan.pdf');
        // return view('laporan.laporan',compact('transaksi', 'total'));
    }
}
