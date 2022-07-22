<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Package;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::join('packages','bookings.kode_paket','=','packages.kode_paket')->where('id_member',auth()->user()->id)->get();
        $status = config('custom.status');
        return view('member.booking.index',compact('bookings','status'));
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        $package = Package::find($booking->kode_paket);
        return view('member.booking.edit',compact('booking','package'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_booking' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $booking = Booking::find($request->kode_booking);
        $booking->tanggal_take = $request->date;
        $booking->jam_take = $request->time;
        $booking->save();
        return redirect()->route('booking.index')->with('success','Data berhasil diubah');

    }
}
