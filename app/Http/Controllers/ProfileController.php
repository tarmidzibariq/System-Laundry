<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($id)
    {
        $data = User::find($id);
        $order = transaksi::where('id_user', $id)
            ->count();
        return view('feature.profile', compact('data', 'order'));
    }
    public function update(Request $request, $id)
    {
        $nm = $request->foto;
        $namafile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
        $update = User::find($id)->update([
            'name' => $request->nama_dp . ' ' . $request->nama_bl,
            'email' => $request->email,
            'tlp' => $request->tlp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $namafile,
        ]);
        $nm->move(public_path() . '/img', $namafile);

        return redirect()->route('profile', [Auth::user()->id])->with('success', 'Profile berhasil diedit!');
    }
}
