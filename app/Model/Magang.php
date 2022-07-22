<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    protected $fillable = [
        'agama_id', 'operator_id', 'nama', 'no_hp', 'umur', 'pas_foto', 'foto_ktp', 'medsos', 'alamat_domisili', 'asal_institusi','tempat_lahir', 'tanggal_lahir', 'jk','periode_id'
    ];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'id');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id');
    }

    public function detail_tugas()
    {
        return $this->hasMany(DetailTugas::class, 'id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
