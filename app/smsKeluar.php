<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smsKeluar extends Model
{
    protected $table='outbox';
    protected $guarded=[];
    public $timestamps = false;
}
