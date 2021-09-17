<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\Outlet;
use Illuminate\Support\Facades\Hash;
class PenggunaController extends Controller
{
    public function index()
    {
        $user=User::orderBy('id')->where('role','member')->paginate(10);
        $toko = User::orderBy('id')->where('role',['admin','member','kasir'])->paginate(10);
        // dd($toko);
        return view('pengguna.index',compact('user','toko'));
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
                'name'=> 'required',
                'email'=> 'required|email',
                'password'=> 'required',
                'role'=> 'required',
            ]
        );
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('pengguna')->with(['success' => 'Berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $user= User::find($id);
        return view('pengguna.editpengguna', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $update= User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('pengguna')->with(['success' => 'Berhasil diedit']);
    }

    public function delete(User $id)
    {
        $id->delete();
        return redirect('pengguna')->with(['success' => 'Berhasil dihapus']);
    }
}
