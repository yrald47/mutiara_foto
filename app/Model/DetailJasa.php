<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailJasa extends Model
{
    protected $primaryKey = ['kode_jasa','id_member','tanggal_take'];
    public $incrementing = false;
    protected $table = 'detail_jasas';
    protected $fillable = [
        'kode_jasa', 'id_member', 'tanggal_take', 'file', 'jumlah','status'
    ];

    protected function setKeysForSaveQuery($query)
    {
        return $query->where('kode_jasa', $this->getAttribute('kode_jasa'))
        ->where('id_member', $this->getAttribute('id_member'))
        ->where('tanggal_take', $this->getAttribute('tanggal_take'));
    }

}
