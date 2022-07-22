<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [ 'nama', 'alamat', 'no_hp'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
