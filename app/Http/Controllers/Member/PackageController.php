<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('member.package.index',compact('packages'));
    }

    public function create()
    {
        return view('member.package.create');
    }

    public function show($id)
    {
        $package = Package::find($id);
        return view('member.package.show',compact('package'));
    }

    public function store(Request $request)
    {
        dd($request->time);
        $this->validate($request,[
            'date' => 'required',
            'time' => 'required',
        ]);
        $kode_booking = 'B'.$request->date.''.$request->time;
        $kode_booking = str_replace('-', '', $kode_booking);
        $kode_booking = str_replace(':', '', $kode_booking);

        $booking = new Booking();
        $booking->kode_booking = $kode_booking;
        $booking->tanggal_take = $request->date;
        $booking->jam_take = $request->time;
        $booking->kode_paket = $request->kode_paket;
        $booking->id_member = auth()->user()->id;
        $booking->save();
        return redirect()->route('booking.index')->with('success','Data berhasil diubah');

    }
}
