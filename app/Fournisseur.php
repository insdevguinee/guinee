<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
    	'name', 'slug', 'contact','email', 'siteweb', 'codef', 'localisation', 'created_at','updated_at',
    ];

    public function caisses()
    {
        return $this->hasMany(Caisse::class, 'tiers', 'id')->whereYear('created_at', session('campagne'));
    }
}
