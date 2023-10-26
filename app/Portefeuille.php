<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portefeuille extends Model
{
    //
    protected $fillable = [
    	'direction_id', 'montant', 'user_id', 'created_at','updated_at' 
    ];

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }
}
