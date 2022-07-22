<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = [
       'tugas', 'deskripsi','status'
    ];

    public function detail()
    {
        return $this->hasMany(DetailTugas::class, 'tugas_id');
    }
    
}
