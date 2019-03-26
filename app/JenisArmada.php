<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisArmada extends Model
{
    protected $fillable = [
      'nama',
      'merk'
    ];

    public function armadas()
    {
      return $this->hasMany('App\Armada');
    }
}
