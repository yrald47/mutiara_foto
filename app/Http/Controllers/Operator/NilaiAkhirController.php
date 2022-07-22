<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Model\Kegiatan;
use App\Model\Magang;
use App\Model\Penilaian;
use App\Model\Tugas;
use Illuminate\Http\Request;

class NilaiAkhirController extends Controller
{
    public function index()
    {
        $magangs = Magang::leftJoin('periodes','magangs.periode_id','=','periodes.id')
        ->leftJoin('penilaians','magangs.id','=','penilaians.magang_id')
        ->where('operator_id', auth()->user()->id)
        ->select('magangs.*','periodes.start_date','periodes.end_date','penilaians.nilai_kepribadian','penilaians.nilai_kegiatan')->get();
        return view('operator.nilai_akhir.index',compact('magangs'));
    }

    public function edit($id)
    {
        $magang = Magang::find($id);
        $nilai_akhir = Penilaian::where('magang_id',$id)->first();
        if(!$nilai_akhir){
            Penilaian::create([
                'magang_id' => $id,
            ]);
        }
        $tugas = Tugas::join('detail_tugas','tugas.id','=','detail_tugas.tugas_id')->select('tugas.*','detail_tugas.nilai','detail_tugas.magang_id')->where('magang_id',$id)->get();
        $kegiatans = Kegiatan::where('magang_id',$id)->get();
        $penilaian = Penilaian::where('magang_id',$id)->first();
        return view('operator.nilai_akhir.edit',compact('magang','tugas','kegiatans','penilaian'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'kepribadian' => 'required',
            'kegiatan' => 'required',
        ]);
        $penilaian = Penilaian::where('magang_id',$id)->first();
        $penilaian->nilai_kepribadian = $request->kepribadian;
        $penilaian->nilai_kegiatan = $request->kegiatan;
        $penilaian->save();

        return redirect()->route('nilai_akhir.index')->with('success','Data berhasil diubah');
    }
}
