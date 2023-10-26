<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imputation extends Model
{
    protected $fillable = [
        'libelle','code',
    ];
}
