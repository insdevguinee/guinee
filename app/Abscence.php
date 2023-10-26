<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abscence extends Model
{
    //
    protected $fillable = [
    	'personnel_id', 'date_abs', 'motif', 'created_by', 
    ];
}
