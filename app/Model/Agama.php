<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $fillable = [
         'nama_agama'
    ];

    public function magang()
    {
        return $this->hasMany(Magang::class, 'id');
    }
}
