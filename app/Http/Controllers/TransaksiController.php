<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Outlet;
use App\Models\Paket;
// use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function create()
    {
        $outlet = Outlet::pluck('nama', 'id');
        $member = Member::all();
        $lima_hari = mktime(0, 0, 0, date("n"), date("j") + 5, date("Y"));
        $batas = date("Y-m-d", $lima_hari);
        return view('order.createorder', compact('outlet', 'batas', 'member'));
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
            $html .=  '<span class="form-control" name="harga">' . $list->harga . '</span>';
            $html .=  '<input class="d-none" id="hargatot" value="' . $list->harga . '"></input>';
        }
        return $html;
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($batas);

        $request->validate([
            'id_outlet' => 'required',
            'id_paket' => 'required',
            // 'kode_invoice'=>'required',
            'id_member' => 'required',
            'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'biaya' => 'required',
            'diskon' => 'required',
            'pajak' => 'required',
            // 'status'=>'required',
            // 'dibayar'=>'required',
            'id_user' => 'required',
        ]);

        // dd($tanggal);
        $tanggal = date("d-m-Y");
        $lima_hari = mktime(0, 0, 0, date("n"), date("j") + 5, date("Y"));
        $batas = date("d-m-Y", $lima_hari);

        $transaksi = Transaksi::create([
            'id_outlet' => $request->id_outlet,
            'id_paket' => $request->id_paket,
            // 'kode_invoice' => $request->kode_invoice,
            'id_member' => $request->id_member,
            'tgl' => $request->tgl,
            'batas_waktu' => $request->batas_waktu,
            'tgl_bayar' => $request->tgl_bayar,
            'biaya' => $request->biaya,
            'diskon' => $request->diskon,
            'pajak' => $request->pajak,
            'status' => 'baru',
            'dibayar' => 'belum_dibayar',
            'id_user' => $request->id_user,
        ]);
        // dd($transaksi);

        return redirect()->route('order.riwayatorder')->with('success', 'Berhasil membuat pesanan!');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $transaksi = Transaksi::where('id_user', $id)->paginate(10);
        // $transaksi = Transaksi::orderBy('id',)->paginate(10);
        $outlet = Outlet::all();
        $paket = Paket::all();
        return view('order.riwayatorder', compact('transaksi', 'outlet', 'paket'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        $outlet = Outlet::find($transaksi->id_outlet);
        $paket = Paket::find($transaksi->id_paket);
        return view('order.show', compact('transaksi', 'outlet', 'paket'));
    }

    public function cancel(Transaksi $id)
    {
        // $cancel = 'cancel';
        // $update = Transaksi::find($id)->update([
        //     'dibayar' => $request->$cancel,
        // ]);
        $id->delete();
        return redirect('order/riwayat')->with('success', 'Pesanan berhasil dibatalkan!');
    }
}
