<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Model\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function index()
    {
        $services = Jasa::all();
        return view('member.jasa.index',compact('services'));
    }

    public function edit($id)
    {
        $service = Jasa::find($id);
        return view('member.jasa.edit',compact('service'));
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
        return redirect()->route('service.index')->with('success','Data berhasil ditambahkan');
    }

    
}
