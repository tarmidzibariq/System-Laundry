<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;  
use App\Models\Paket;  
class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::orderBy('id')->with('outlets')->paginate(10);
        return view('paket.index',compact('paket'));
    }

    public function create()
    {
        $outlet = Outlet::all();
        return view('paket.createpaket', compact('outlet'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'id_outlet' => 'required',
                'jenis' => 'required',
                'nama_paket' => 'required',              
                'harga' => 'required',              
            ]
        );
        $paket = Paket::create([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
        ]);
        return redirect('paket/paket')->with(['succespaket' => 'Paket Berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $outlet = Outlet::all();
        $paket = Paket::find($id);
        return view('paket.editpaket', compact('outlet', 'paket'));
    }

    public function update(Request $request, $id)
    {
        $update = Paket::find($id)->update([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
        ]);
        return redirect('paket/paket')->with(['successpaket' => 'Toko Berhasil diedit']);
    }

    public function delete(Paket $id)
    {
        $id->delete();
        return redirect('paket/paket')->with(['successpaket' => 'Berhasil dihapus']);
    }
}
