<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    //
    protected $table = 'periodes';

    protected $fillable = [
        'start_date', 'end_date'
    ];
}
