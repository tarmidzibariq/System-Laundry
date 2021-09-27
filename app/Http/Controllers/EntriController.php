<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Member;
use App\Models\User;

class EntriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('id')->paginate(10);
        $user = User::all();
        $paket = Paket::all();
        $outlet = Outlet::all();
        return view('entri.index', compact('transaksi', 'user', 'paket', 'outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        $outlet = Outlet::find($transaksi->id_outlet);
        $paket = Paket::find($transaksi->id_paket);
        $member = Member::find($transaksi->id_member);
        $user = User::find($transaksi->id_user);
        return view('entri.show', compact('transaksi', 'outlet', 'paket', 'member', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        // $outlet = Outlet::find($transaksi->id_outlet);
        // $paket = Paket::find($transaksi->id_paket);
        return view('Entri.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Transaksi::find($id)->update([
            'status' => $request->status,
            'dibayar' => $request->dibayar,
        ]);
        return redirect('entri/entri')->with('success', 'Entri berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Transaksi $id)
    {
        $id->delete();
        return redirect('entri/entri')->with('success', 'Entri berhasil dihapus!');
    }

    public function trash()
    {
        $transaksi = Transaksi::onlyTrashed()->get();
        return view('entri.pesananbatal', compact('transaksi'));
    }
}
