<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table = 'galeries';
    protected $primaryKey = 'kode_foto';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_foto', 'nama', 'foto'];
}
