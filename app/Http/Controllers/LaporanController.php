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
        // $transaksi = Transaksi::whereIn('tgl', ['2021-10-06', '2021-10-14'])->get();
            $jumlah ='' ;
        // dd($transaksi); 
        return view('laporan.index', compact('transaksi','total','jumlah'));
    }

    public function filter(Request $request)
    {
        // $transaksi = Transaksi::whereIn('tgl', [$request->min, $request->max])->get();
        if (empty($request->min) or empty($request->max)) {
            return redirect()->route('laporan.index');
        }else {
            $transaksi = Transaksi::select("*")
            ->whereBetween('tgl', [$request->min, $request->max])
            ->get();

            $jumlah = [
                Transaksi::where('tgl', $request->min)->count(),
                Transaksi::where('tgl', $request->max)->count()
            ];
        
            $total = Transaksi::select("*")->whereBetween('tgl', [$request->min, $request->max])->sum('biaya');
            return view('laporan.index', compact('transaksi', 'total','jumlah'));
        }
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
