<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    protected $table = 'jasas';
    protected $primaryKey = 'kode_jasa';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_jasa', 'nama', 'deskripsi', 'harga'];
}
