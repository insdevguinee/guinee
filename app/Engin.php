<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engin extends Model
{
    protected $fillable = [
    	'number_team', 'number', 'brand', 'engin_type'
    ];
}
