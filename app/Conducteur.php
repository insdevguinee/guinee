<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
    protected $fillable = [
    	'last_name', 'name', 'phone', 'number_team', 'number_car', 'supervisor_id', 'brand_car', 'created_by', 'etat'
    ];
}
