<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Response;
use App\Model\Booking;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $booking = Booking::join('users', 'users.id', '=', 'bookings.id_member')
                            ->join('packages', 'packages.kode_paket', '=', 'bookings.kode_paket')
                            ->get(['bookings.*', 'packages.*', 'users.*']);
        return view('admin.report.index', compact('booking'));
    }

    public function getReport(Request $request){
        $data = Booking::join('users', 'users.id', '=', 'bookings.id_member')
        ->join('packages', 'packages.kode_paket', '=', 'bookings.kode_paket')
        ->where('tanggal_take', '=', $request->range)
        ->get(['bookings.*', 'packages.*', 'users.*']);
        // dd($request->range);
        return response()->json(array('data'=> $request->tipe), 200);
    }
}
