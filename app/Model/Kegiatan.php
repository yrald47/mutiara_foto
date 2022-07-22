<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'magang_id', 'kegiatan','date','verifikasi'
    ];

    public function magang()
    {
        return $this->belongsTo(Magang::class, 'id');
    }
}
