<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table='dokter';
    protected $guarded=[];

    public function poli()
    {
        return $this->belongsTo(Poli::class,'id_poli');
    }
}
