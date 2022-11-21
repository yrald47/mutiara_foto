<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Booking;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // $booking = Booking::all();
        $booking = Booking::join('users', 'users.id', '=', 'bookings.id_member')
                            ->join('packages', 'packages.kode_paket', '=', 'bookings.kode_paket')
                            ->get(['bookings.*', 'packages.*', 'users.*']);
        // dd($booking);
        return view('admin.transactions.index', compact('booking'));
        // $users = Booking::join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();

    }
}
