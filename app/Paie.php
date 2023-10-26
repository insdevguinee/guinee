<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paie extends Model
{
     protected $fillable = [
    	'personnel_id', 'prime', 'conges', 'gratification', 'carburant', 'communication', 'perdiem', 'internet', 'guide','prime_ni','avance','transport','mise_route','actif','created_at',
    ];
}
