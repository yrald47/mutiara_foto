<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Model\Kegiatan;
use App\Model\Magang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    //
    public function index()
    {
        $magangs = Magang::where('operator_id',auth()->user()->id)->get();
        $kegiatans = Kegiatan::whereIn('magang_id',$magangs->pluck('id'))->get();
        $magang = $magangs->pluck('nama','id');
        $date = date('Y-m-d');
        return view('operator.kegiatan.index',compact('kegiatans','magang','date'));
    }

    public function create()
    {
        return view('operator.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
        ]);
        
        return redirect()->route('kegiatans.show',$request->date)->with('success','Data berhasil di Filter');
    }

    public function show($id)
    {
        $magangs = Magang::where('operator_id',auth()->user()->id)->get();
        $kegiatans = Kegiatan::where('date',$id)->whereIn('magang_id',$magangs->pluck('id'))->get();
        $magang = $magangs->pluck('nama','id');
        $date = $id;
        return view('operator.kegiatan.index',compact('kegiatans','magang','date'));
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        $magangs = Magang::pluck('nama','id');
        return view('operator.kegiatan.edit',compact('kegiatan','magangs'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);

        // dd($request->all())
        $kegiatan->update([
            'verifikasi' => $request->status,
        ]);
        return redirect()->route('kegiatans.index',$request->date)->with('success','Kegiatan berhasil diverifikasi');
    }
}
