<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'nilai_kegiatan', 'magang_id', 'nilai_kepribadian'
    ];

    public function magang()
    {
        return $this->belongsTo(Magang::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
