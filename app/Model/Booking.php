<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'kode_booking';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_booking', 'kode_paket', 'id_member', 'tanggal_take', 'jam_take', 'status'];
}
