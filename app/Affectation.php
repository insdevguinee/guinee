<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    // public $incrementing = true;

    protected $fillable = [
    	'fonction_id', 'direction_id', 'personnel_id', 'team_number', 'etat', 'created_by', 'updated_at'
    ];

    // protected $guarded= [];

    public function personnels()
    {
        // return $this->belongsToMany(Personnel::class);
        // //  return $this->belongsToMany(Personnel::class)->as('subscription')->withTimestamps();

        // return $this->belongsToMany(Personnel::class, 'affectations', 'personnel_id', 'direction_id')
        return $this->belongsToMany(Personnel::class)
        ->withPivot('personnels', 'fonction_id', 'direction_id', 'personnel_id', 'team_number', 'etat', 'created_by', 'updated_at');       

    }

}
