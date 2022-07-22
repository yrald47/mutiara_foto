<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function index()
    {
        $services = Jasa::all();
        return view('admin.jasa.index',compact('services'));
    }

    public function create()
    {
        return view('admin.jasa.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'kode_jasa' => 'required|max:4|unique:jasas',
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        $jasa = new Jasa;
        $jasa->kode_jasa = $request->kode_jasa;
        $jasa->nama = $request->nama;
        $jasa->harga = $request->harga;
        $jasa->deskripsi = $request->deskripsi;
        $jasa->save();
        return redirect()->route('services.index')->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $service = Jasa::find($id);
        return view('admin.jasa.edit',compact('service'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);
        $service = Jasa::find($id);
        $service->nama = $request->nama;
        $service->deskripsi = $request->deskripsi;
        $service->harga = $request->harga;
        $service->save();
        return redirect()->route('services.index')->with('primary','Data berhasil diubah');
    }

    public function destroy($id)
    {
        $service = Jasa::find($id);
        $service->delete();
        return redirect()->route('services.index')->with('danger','Data berhasil dihapus');
    }
    
}
