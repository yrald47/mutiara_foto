<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $primaryKey = 'kode_paket';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_paket', 'nama', 'deskripsi', 'harga','foto'];
}
