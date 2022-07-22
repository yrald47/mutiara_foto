<?php

namespace App\Http\Controllers\Magang;

use App\Http\Controllers\Controller;
use App\Model\DetailTugas;
use App\Model\Kegiatan;
use App\Model\Magang;
use App\Model\Operator;
use App\Model\Penilaian;
use App\Model\Periode;
use App\Model\Tugas;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('magang.laporan.index');
    }

    public function kegiatan(){
        $user = auth()->user();
        $magang = Magang::find($user->id);
        $operators = Operator::pluck('name','id');
        $startDate = Periode::pluck('start_date','id');
        $endDate = Periode::pluck('end_date','id');
        $kegiatans = Kegiatan::where('magang_id',$user->id)->where('verifikasi',1)->get();

        $pdf = PDF::loadview('magang.laporan.kegiatan',[
            'magang' => $magang,
            'operators' => $operators,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'kegiatans' => $kegiatans,
        ]);
    	return $pdf->download('laporan-kegiatan.pdf');
        // return view('magang.laporan.kegiatan',compact('magang','operators','startDate','endDate','kegiatans'));
    }

    public function tugas(){
        $user = auth()->user();
        $magang = Magang::find($user->id);
        $operators = Operator::pluck('name','id');
        $startDate = Periode::pluck('start_date','id');
        $endDate = Periode::pluck('end_date','id');
        $tugas = Tugas::join('detail_tugas','tugas.id','=','detail_tugas.tugas_id')
        ->select('tugas.*','detail_tugas.nilai')
        ->where('magang_id',$user->id)
        ->where('nilai','!=',0)
        ->get();
        $pdf = PDF::loadview('magang.laporan.tugas',[
            'magang' => $magang,
            'operators' => $operators,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'tugas' => $tugas,
        ]);
    	return $pdf->download('laporan-tugas.pdf');
        // return view('magang.laporan.tugas',compact('magang','operators','startDate','endDate','tugas'));
    }

    public function akhir(){
        $user = auth()->user();
        $magang = Magang::find($user->id);
        $operators = Operator::pluck('name','id');
        $startDate = Periode::pluck('start_date','id');
        $endDate = Periode::pluck('end_date','id');
        $tugas = Tugas::join('detail_tugas','tugas.id','=','detail_tugas.tugas_id')
        ->select('tugas.*','detail_tugas.nilai')
        ->where('magang_id',$user->id)
        ->where('nilai','!=',0)
        ->get();
        $penilaian = Penilaian::where('magang_id',$user->id)->first();
        $pdf = PDF::loadview('magang.laporan.akhir',[
            'magang' => $magang,
            'operators' => $operators,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'tugas' => $tugas,
            'penilaian' => $penilaian,
        ]);
        return $pdf->download('laporan-akhir.pdf');
        // return view('magang.laporan.akhir',compact('magang','operators','startDate','endDate','penilaian','tugas'));
    }
}
