<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hinta extends Model
{
    protected $table = 'hinta';
    protected $primaryKey = 'hinta_id';
    protected $fillable = array('hinta_nuuska_id', 'nuuskakaira', 'nuuskakenraali', 'muu');
    public $timestamps = false;
}
