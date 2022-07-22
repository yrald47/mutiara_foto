<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailTugas extends Model
{
    protected $primaryKey = ['tugas_id', 'magang_id'];
    public $incrementing = false;
    protected $fillable = [
        'tugas_id', 'magang_id', 'tanggal_submit', 'file', 'nilai'
    ];

    protected function setKeysForSaveQuery($query)
    {
        return $query->where('tugas_id', $this->getAttribute('tugas_id'))
        ->where('magang_id', $this->getAttribute('magang_id'));
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id');
    }

    public function magang()
    {
        return $this->belongsTo(Magang::class, 'id');
    }
}
