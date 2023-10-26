<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
   	protected $fillable = [
        'libelle','created_at','updated_at',
    ];

    // public function personnels()
    // {
    //     return $this->hasMany(Personnel::class);
    // }

    public function activePersonnels(){
        return $this->personnels()->orderBy('nom', 'asc')->where('etat',1);
    }

    public function portefeuilles()
    {
        return $this->hasMany(Portefeuille::class)->whereYear('created_at',session('campagne'));
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }


    // ---------------------------- many to many ------------------
    public function personnels()
    {
        // return $this->belongsToMany(Personnel::class);
        // //  return $this->belongsToMany(Personnel::class)->as('subscription')->withTimestamps();

        // return $this->belongsToMany(Personnel::class, 'affectations', 'personnel_id', 'direction_id')
        return $this->belongsToMany(Personnel::class)
        ->withPivot('matricule', 'nom', 'prenoms', 'fonction_id', 'mm_numero', 'contact', 'direction_id',
        'numero_equipe', 'created_by', 'created_at','updated_at','deleted_at','etat',
        'note', 'is_admited', 'admited_at','rank','priority', 'position', 'unity', 'areas');       

    }

    public function fonctions()
    {
        return $this->belongsToMany(Fonction::class);
    }

}
