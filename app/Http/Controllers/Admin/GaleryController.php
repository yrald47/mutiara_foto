<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    public function index()
    {
        $galleries = Galery::all();
        return view('admin.galery.index',compact('galleries'));
    }

    public function create()
    {
        return view('admin.galery.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'kode_foto' => 'required|max:4|unique:galeries',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotopath = null;
        if ($request->hasFile('foto')) {
            $fotoname = $request->file('foto')->hashName();
            $fotopath = 'foto/'.$fotoname;
            Storage::disk('public')->put($fotopath, file_get_contents($request->foto));
        }
        $galery = new Galery;
        $galery->kode_foto = $request->kode_foto;
        $galery->nama = $request->nama;
        $galery->foto = $fotopath;
        $galery->save();
        return redirect()->route('galleries.index')->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $galery = Galery::find($id);
        return view('admin.galery.edit',compact('galery'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $galery = Galery::find($id);
        $galery->nama = $request->nama;
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($galery->foto);
            $fotoname = $request->file('foto')->hashName();
            $fotopath = 'foto/'.$fotoname;
            Storage::disk('public')->put($fotopath, file_get_contents($request->foto));
            $galery->foto = $fotopath;
        }
        $galery->save();
        return redirect()->route('galleries.index')->with('success','Data berhasil diubah');    

    }

    public function destroy($id)
    {
        $galery = Galery::find($id);
        Storage::disk('public')->delete($galery->foto);
        $galery->delete();
        return redirect()->route('galleries.index')->with('success','Data berhasil dihapus');
    }
}
