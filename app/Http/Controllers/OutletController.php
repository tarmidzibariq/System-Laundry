<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OutletController extends Controller
{
    public function Index()
    {
        $outlet = Outlet::orderBy('id')->paginate(10);
        return view('outlet.index', compact('outlet'));
    }

    public function create()
    {
        return view('outlet.createoutlet');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'tlp' => 'required',
            ]
        );
        $user = Outlet::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
        ]);
        return redirect('outlet/outlet')->with('success', 'Outlet berhasil ditambah!');
    }

    public function edit($id)
    {
        $outlet = Outlet::find($id);
        return view('outlet.editoutlet', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $update = Outlet::find($id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
        ]);
        return redirect('outlet/outlet')->with('success', 'Outlet berhasil diedit!');
    }

    public function delete($id)
    {
        // dd($id);


        // $id->delete();
        //  dd($id_user);
        // User::where('id',$id_user->id_outlet)->delete();
        // dd($id);
        $id_user = User::where('id_outlet', $id)->get();
        foreach ($id_user as $key => $value) {
            if (Auth::user()->id == $value->id) {
                Auth::logout();
            }
            $value->delete();
        }
        Outlet::where('id', $id)->delete();
        return redirect('outlet/outlet')->with('success', 'Outlet berhasil dihapus!');
    }
}
