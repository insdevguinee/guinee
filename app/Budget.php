<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
   	protected $fillable = [
    	'code1', 'code2', 'ligne_budget', 'compta', 'phase_operation', 'libelle',
    ];
}
