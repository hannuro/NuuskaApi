<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nuuska extends Model
{
    protected $table = 'nuuska';
    protected $primaryKey = 'nuuska_id';
    protected $fillable = array('nimi', 'tyyppi');
    public $timestamps = false;

}
