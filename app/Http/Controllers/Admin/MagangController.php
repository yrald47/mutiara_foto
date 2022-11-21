<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Agama;
use App\Model\Magang;
use App\Model\Operator;
use App\Model\Periode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MagangController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()->id==1) {
            $magangs = Magang::leftJoin('periodes','magangs.periode_id','=','periodes.id')
            ->select('magangs.*','periodes.start_date','periodes.end_date')
            ->get();
        } else {
            $magangs = Magang::leftJoin('periodes','magangs.periode_id','=','periodes.id')->where('operator_id', auth()->user()->id)->select('magangs.*','periodes.start_date','periodes.end_date')->get();
        }
        return view('admin.magang.index',compact('magangs'));
    }

    public function create()
    {
        $genders = ['Laki-laki','Perempuan'];
        $agamas = Agama::all();
        $operators = Operator::all();
        return view('admin.magang.create',compact('agamas','operators','genders'));
    }

    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'id_magang' => 'required',
                'nama' => 'required',
                'jk' => 'required',
                'agama_id' => 'required',
                'alamat' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'no_hp' => 'required',
                'operator_id' => 'required',
                'medsos' => 'required',
                'institusi' => 'required',
            ]);
            $ktppath = null;
            $fotopath = null;
            if ($request->hasFile('foto')) {
                $fotoname = $request->file('pas_foto')->getClientOriginalName();
                $fotopath = 'foto/'.$fotoname;
                Storage::disk('public')->put($fotopath, file_get_contents($request->pas_foto));
            }
            if($request->hasFile('ktp')){
                $ktpname = $request->file('foto_ktp')->getClientOriginalName();
                $ktppath = 'ktp/'.$ktpname;
                Storage::disk('public')->put($ktppath, file_get_contents($request->foto_ktp));
            }
            
            $user = User::create([
                'id' => $request->id_magang,
                'username' => $request->id_magang,
                'email' => $request->id_magang.'@mail.com',
                'password' => bcrypt($request->id_magang),
            ]);
            $user->assignRole('magang');
            $user->magang()->create([
                'nama' => $request->nama,
                'jk' => $request->jk,
                'agama_id' => $request->agama_id,
                'operator_id' => $request->operator_id,
                'alamat_domisili' => $request->alamat,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'pas_foto' => $request->pas_foto,
                'foto_ktp' => $request->foto_ktp,
                'medsos' => $request->medsos,
                'asal_institusi' => $request->institusi,
                'pas_foto' => $fotopath,
                'foto_ktp' => $ktppath,
            ]);
        }catch(\Exception $e){
            dd($e);
            return redirect()->route('magang.create')->with('error','Data gagal ditambahkan');
        }
        
        return redirect()->route('magangs.index')->with('success','Magang berhasil ditambahkan');
    }

    public function show($id)
    {
        $magang = Magang::find($id);
        $agamas = Agama::pluck('nama_agama','id');
        $operators = Operator::pluck('name','id');
        $user = User::find($id);
        return view('admin.magang.show',compact('magang','agamas','operators','user'));
    }

    public function edit($id)
    {
        $magang = Magang::find($id);
        $operators = Operator::all();
        return view('admin.magang.edit',compact('magang','operators'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_magang' => 'required',
            'nama' => 'required',
            'operator_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $periode = Periode::where('start_date',$request->start_date)->where('end_date',$request->end_date)->first();
        if ($periode) {
            $periode_id = $periode->id;
        } else {
            $periode = Periode::create([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            $periode_id = $periode->id;
        }
        $magang = Magang::find($id);
        $magang->update([
            'nama' => $request->nama,
            'operator_id' => $request->operator_id,
            'periode_id' => $periode_id,
        ]);
        if($magang->operator_id){
            $user = User::find($magang->id);
            $user->removeRole('pramagang');
            $user->assignRole('magang');

        }
        return redirect()->route('magangs.index')->with('success','Data Peserta Magang berhasil diupdate');
    }

    public function destroy($id)
    {
        $magang = Magang::find($id);
        $magang->delete();
        return redirect()->route('magangs.index')->with('success','Magang berhasil dihapus');
    }
}
