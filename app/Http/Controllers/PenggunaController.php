<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class PenggunaController extends Controller
{
    public function index()
    {
        $user=User::all()->where('role','member');
        return view('pengguna.index',compact('user'));
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
        return redirect('pengguna')->with(['success' => 'Pesan Berhasil']);
    }

    public function edit($id)
    {
        $user= User::find($id);
        return view('pengguna.editpengguna', compact('user'));
    }
}
