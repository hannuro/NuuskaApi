<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arvostelu extends Model
{
    protected $table = 'arvostelut';
    protected $primaryKey = 'arvostelu_id';
    protected $fillable = array('arvostelu_nuuska_id', 'nimimerkki', 'kommentti', 'arvosana');
    public $timestamps = false;
}
