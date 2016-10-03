<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hinta extends Model
{
    protected $table = 'hinnat';
    protected $primaryKey = 'hinnat_id';
    protected $fillable = array('hinta_nuuska_id', 'nuuskakaira', 'nuuskakenraali', 'muu');
    public $timestamps = false;
}
