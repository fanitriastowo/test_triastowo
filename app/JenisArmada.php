<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisArmada extends Model
{
    protected $fillable = [
      'nama',
      'merk'
    ];

    public function Armadas()
    {
      return $this->belongsTo('App\Armada');
    }
}
