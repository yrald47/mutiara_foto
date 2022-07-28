<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Model\DetailJasa;
use App\Model\Jasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JasaController extends Controller
{
    public function index()
    {
        $services = Jasa::all();
        $dservices = DetailJasa::join('jasas', 'detail_jasas.kode_jasa', '=', 'jasas.kode_jasa')
            ->where('id_member', auth()->user()->id)
            ->get();
        $status = config('custom.status_service');
        return view('member.jasa.index',compact('services','dservices','status'));
    }

    public function edit($id)
    {
        $service = Jasa::find($id);
        $dservice = DetailJasa::where('kode_jasa', $id)
            ->where('id_member', auth()->user()->id)
            ->where('status',0)
            ->first();
        return view('member.jasa.edit',compact('service','dservice'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'jumlah' => 'required',
            'tanggal_take' => 'required',
        ]);
        $dservice = DetailJasa::where('kode_jasa', $request->kode_jasa)
            ->where('id_member', auth()->user()->id)
            ->where('status',0)
            ->first();
        if ($dservice) {
            $dservice->update([
                'jumlah' => $request->jumlah,
                'tanggal_take' => $request->tanggal_take,
            ]);
        } else {
            $dservice = DetailJasa::create([
                'kode_jasa' => $request->kode_jasa,
                'id_member' => auth()->user()->id,
                'jumlah' => $request->jumlah,
                'tanggal_take' => $request->tanggal_take,
                'status' => 0,
            ]);
            $this->validate($request, [
                'file' => 'required',
            ]);
        }
        $fotopath = null;
        if ($request->hasFile('file')) {
            $fotoname = $request->file('file')->hashName();
            $fotopath = 'jasa/'.$fotoname;
            Storage::disk('public')->put($fotopath, file_get_contents($request->file));
            $dservice->update([
                'file' => $fotopath,
            ]);
        }
        return redirect()->route('service.index')->with('success', 'Service created successfully');
    }

    

    
}
