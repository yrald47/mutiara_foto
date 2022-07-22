<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Model\DetailTugas;
use App\Model\Tugas;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    //
    public function index()
    {
        $tugas = Tugas::join('detail_tugas','tugas.id','=','detail_tugas.tugas_id')
            ->join('magangs','detail_tugas.magang_id','=','magangs.id')
            ->where('magangs.operator_id','=',auth()->user()->id)
            ->where('detail_tugas.file','!=',null)
            ->select('tugas.*','magangs.nama','detail_tugas.file','detail_tugas.nilai','detail_tugas.magang_id')
            ->distinct()
            ->get();
        return view('operator.penilaian.index',compact('tugas'));
    }

    public function nilai($tugasid,$magangid)
    {
        $tugas = Tugas::find($tugasid);
        $detail = DetailTugas::where('tugas_id','=',$tugasid)
        ->where('magang_id','=',$magangid)
        ->first();
        return view('operator.penilaian.show',compact('tugas','detail'));
    }

    public function penilaian(Request $request,$id,$di){
        try{
            $this->validate($request, [
                'nilai' => 'required',
            ]);
            $tugas = DetailTugas::where('tugas_id',$id)->where('magang_id',$di)->first();
            $tugas->update([
                'nilai' => $request->nilai
            ]);
            
        }catch(\Exception $e){
            dd($e);
            return redirect()->back()->with('error',$e->getMessage());
        }
        
        return redirect()->route('penilaians.index')->with('success','Data berhasil ditambahkan');
    }

    public function akhir(){
        
    }


}
