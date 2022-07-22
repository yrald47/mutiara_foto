<?php

namespace App\Http\Controllers\Magang;

use App\Http\Controllers\Controller;
use App\Model\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    //
    public function index()
    {
        $kegiatans = Kegiatan::where('magang_id',auth()->user()->id)->get();
        return view('magang.kegiatan.index',compact('kegiatans'));
    }

    public function create()
    {
        return view('magang.kegiatan.create');
    }

    public function store(Request $request)
    {
        try{
            $kegiatan = Kegiatan::create([
                'kegiatan' => $request->nama,
                'magang_id' => auth()->user()->id,
                'date' => date('Y-m-d'),
            ]);
            return redirect()->route('kegiatan.index')->with('success','Kegiatan berhasil ditambahkan');
        }catch(\Exception $e){
            return redirect()->route('kegiatan.index')->with('danger','Kegiatan tidak bisa ditambahkan');
        }
        $request->validate([
            'nama' => 'required',
        ]);
        
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('magang.kegiatan.show',compact('kegiatan'));
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('magang.kegiatan.edit',compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->update([
            'kegiatan' => $request->nama,
        ]);
        return redirect()->route('kegiatan.index')->with('success','Kegiatan berhasil diubah');
    }
}
