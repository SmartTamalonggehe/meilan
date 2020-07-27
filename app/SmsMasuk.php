<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsMasuk extends Model
{
    protected $table='inbox';
    protected $guarded=[];
    public $timestamps = false;

    public function pasien()
    {
        return $this->belongsTo(pasien::class,'no_hp','SenderNumber');
    }
}
