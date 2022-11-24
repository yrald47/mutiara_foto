<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Model\Booking;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $booking = Booking::join('users', 'users.id', '=', 'bookings.id_member')
                            ->join('packages', 'packages.kode_paket', '=', 'bookings.kode_paket')
                            ->get(['bookings.*', 'packages.*', 'users.*']);
        return view('admin.transactions.index', compact('booking'));
    }
}
