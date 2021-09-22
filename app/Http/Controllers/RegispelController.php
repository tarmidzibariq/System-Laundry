<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class RegispelController extends Controller
{
    public function index()
    {
        $member= Member::orderBy('id')->paginate(10);
        return view('regispel.index', compact('member'));
    }
    public function indexmember()
    {
        $member= Member::orderBy('id')->paginate(10);
        return view('regispel.indexmember', compact('member'));
    }

    public function createmember()
    {
        // $member = member::find($id);
        return view('regispel.createmember');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'tlp' => 'required',
            ]
        );
        $member = Member::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp,
            
        ]);
        return redirect('regispel/regispel/indexmember')->with('success', 'Telah DiRegistrasi');
    }

    public function edit($id)
    {
        $member = Member::find($id);
        return view('regispel.edit',compact('member'));
    }

    public function update(Request $request, $id)
    {
        $update = Member::find($id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp,
        ]);
        return redirect('regispel/index')->with('success', 'Registrasi Pelanggan berhasil diedit!');
    }
}
