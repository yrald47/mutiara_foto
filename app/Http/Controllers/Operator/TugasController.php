<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Model\Magang;
use App\Model\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $tugas = Tugas::leftJoin('detail_tugas','tugas.id','=','detail_tugas.tugas_id')
            ->leftJoin('magangs','detail_tugas.magang_id','=','magangs.id')
            ->where('magangs.operator_id','=',$user->id)
            ->select('tugas.*')
            ->distinct()
            ->get();
        ;
        return view('operator.tugas.index',compact('tugas'));
    }

    public function create()
    {
        return view('operator.tugas.create');
    }

    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'nama' => 'required',
                'detail' => 'required',
            ]);
            $tugas = Tugas::create([
                'tugas' => $request->nama,
                'deskripsi' => $request->detail,
            ]);
            $magangs = Magang::where('operator_id',auth()->user()->id)->get();
            foreach($magangs as $magang){
                $tugas->detail()->create([
                    'magang_id' => $magang->id,
                ]);
            }
        }catch(\Exception $e){
            dd($e);
            return redirect()->back()->with('error',$e->getMessage());
        }
        
        return redirect()->route('list_tugas.index')->with('success','Tugas berhasil ditambahkan');
    }

    public function show($id)
    {
        $tugas = Tugas::find($id);
        return view('operator.tugas.show',compact('tugas'));
    }

    public function edit($id)
    {
        $tugas = Tugas::find($id);
        return view('operator.tugas.edit',compact('tugas'));
    }

    public function update(Request $request, $id)
    {
        try{
            $this->validate($request, [
                'nama' => 'required',
                'detail' => 'required',
            ]);
            $tugas = Tugas::find($id);
            $tugas->update([
                'tugas' => $request->nama,
                'deskripsi' => $request->detail,
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
        
        return redirect()->route('list_tugas.index')->with('success','Tugas berhasil diubah');
    }

    public function destroy($id)
    {
        $tugas = Tugas::find($id);
        $tugas->delete();
        return redirect()->route('list_tugas.index')->with('success','Tugas berhasil dihapus');
    }
}
