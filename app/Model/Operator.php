<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $fillable = [
        'name', 'jabatan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function magang()
    {
        return $this->hasMany(Magang::class, 'operator_id');
    }

}
