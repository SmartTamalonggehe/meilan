<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table='antrian';
    protected $guarded=[];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class,'id_dokter');
    }
    public function pasien()
    {
        return $this->belongsTo(pasien::class,'id_pasien');
    }

}
