<?php

namespace App\Http\Controllers\Magang;

use App\Http\Controllers\Controller;
use App\Model\DetailTugas;
use App\Model\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    //
    public function index()
    {
        $tugas = Tugas::join('detail_tugas','tugas.id','=','detail_tugas.tugas_id')
            ->where('magang_id','=',auth()->user()->id)
            ->select('tugas.*','detail_tugas.file','detail_tugas.nilai')
            ->distinct()
            ->get();
        return view('magang.tugas.index',compact('tugas'));
    }

    public function create()
    {
        return view('magang.tugas.create');
    }

    public function show($id)
    {
        $tugas = Tugas::find($id);
        $detail = DetailTugas::where('tugas_id','=',$id)
        ->where('magang_id','=',auth()->user()->id)
        ->first();
        return view('magang.tugas.show',compact('tugas','detail'));
    }

    public function update(Request $request,$id){
        try{
            $this->validate($request, [
                'tugas' => 'required',
            ]);
            $tugasname = $request->file('tugas')->getClientOriginalName();
            $tugaspath = 'tugas/'.$tugasname;
            Storage::disk('public')->put($tugaspath, file_get_contents($request->tugas));
            
            $tugas = DetailTugas::where('tugas_id',$id)->where('magang_id',auth()->user()->id)->first();
            if($tugas->file){
                Storage::disk('public')->delete($tugas->file);
            }
            $tugas->update([
                'file' => $tugaspath
            ]);
            
        }catch(\Exception $e){
            dd($e);
            return redirect()->back()->with('error',$e->getMessage());
        }
        
        return redirect()->route('tugas.index')->with('success','Data berhasil ditambahkan');
    }
}
