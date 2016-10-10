<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiedot extends Model
{
    protected $table = 'tiedot';
    protected $primaryKey = 'tieto_id';
    protected $fillable = array('nikotiinipitoisuus', 'pakkauskoko', 'valmistaja', 'tieto_nuuska_id');
    public $timestamps = false;

    public function nuuska(){
        return $this->belongsTo('App\Nuuska');
    }

    
}
