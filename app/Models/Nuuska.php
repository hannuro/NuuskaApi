<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nuuska extends Model
{
    protected $table = 'nuuska';
    protected $primaryKey = 'nuuska_id';
    protected $fillable = array('nimi', 'tyyppi');
    public $timestamps = false;

    public function tiedot()
    {
        return $this->hasOne('App\Tiedot', 'foreign_key');
    }

    public function hinta()
    {
        return $this->hasOne('App\Hinta', 'foreign_key');
    }

}
