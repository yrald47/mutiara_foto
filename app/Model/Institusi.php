<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    protected $fillable = [
        'nama_institusi'
    ];

    public function magang()
    {
        return $this->hasMany(Magang::class, 'id');
    }
}
