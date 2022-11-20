<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Booking;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $booking = Booking::all();
        return view('admin.transactions.index', compact('booking'));
    }
}
