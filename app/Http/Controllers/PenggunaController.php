<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id')->where('role', 'member')->paginate(10);
        $toko = User::orderBy('id')->whereIn('role', ['admin', 'owner', 'kasir'])->with('outlets')->paginate(10);
        // $toko1 = User::orderBy('id')->where('role','kasir')->paginate(10);
        // $toko2 = User::orderBy('id')->where('role','owner')->paginate(10);
        // dd($toko);
        return view('pengguna.index', compact('user', 'toko'));
    }

    public function create()
    {
        return view('pengguna.createpengguna');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required',
            ]
        );
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('pengguna/pengguna')->with('success', 'Pengguna berhasil ditambah!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pengguna.editpengguna', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $update = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('pengguna/pengguna')->with('success', 'Pengguna berhasil diedit!');
    }

    public function delete(User $id)
    {
        $id->delete();
        return redirect('pengguna/pengguna')->with('success', 'Pengguna berhasil dihapus!');
    }

    // Toko

    public function createtoko()
    {
        $outlet = Outlet::all();
        return view('pengguna.createtoko', compact('outlet'));
    }

    public function storetoko(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required',
                'id_outlet' => 'required',
            ]
        );
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'id_outlet' => $request->id_outlet,
        ]);
        return redirect('pengguna/pengguna')->with('success', 'Toko berhasil dibuat!');
    }

    public function edittoko($id)
    {
        $outlet = Outlet::all();
        $user = User::find($id);
        return view('pengguna.edittoko', compact('outlet', 'user'));
    }

    public function updatetoko(Request $request, $id)
    {
        $update = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'id_outlet' => $request->id_outlet,
        ]);
        return redirect('pengguna/pengguna')->with('success', 'Toko berhasil diedit!');
    }

    public function deletetoko(User $id)
    {
        $id->delete();
        return redirect('pengguna/pengguna')->with('success', 'Tokok berhasil dihapus!');
    }
}
