<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
     protected $fillable = [
        'libelle','salaire','created_at','updated_at',
    ];

    // ---------------------------- many to many ------------------
    public function directions()
    {
        return $this->belongsToMany(Direction::class, 'affectations', 'fonction_id', 'direction_id');
    }
    
    public function personnels()
    {
        return $this->belongsToMany(Personnel::class);
    }
    
}
