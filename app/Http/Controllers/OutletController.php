<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
class OutletController extends Controller
{
    public function Index()
    {
        $outlet=Outlet::orderBy('id')->paginate(10);
        return view('outlet.index',compact('outlet'));
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
        return redirect('outlet')->with(['success' => 'Berhasil ditambahkan']);
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
        return redirect('outlet')->with(['success' => 'Berhasil diedit']);
    }

    public function delete(Outlet $id)
    {
        $id->delete();
        return redirect('outlet')->with(['success' => 'Berhasil dihapus']);
    }
}
