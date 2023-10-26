<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Personnel extends Model
{
    protected $fillable = [
    	'matricule', 'nom', 'prenoms', 'fonction_id', 'mm_numero', 'contact', 'direction_id',
        'numero_equipe', 'created_by', 'created_at','updated_at','deleted_at','etat',
        'note', 'is_admited', 'admited_at','rank','priority', 'position', 'unity', 'areas'
    ];

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    static function myDirection()
    {
        return \App\Personnel::active()->where('direction_id', Auth::user()->direction->id);
    }

    static function myDirectionFormation()
    {
        return \App\Personnel::formation()->where('direction_id', Auth::user()->direction->id);
    }

    static function active()
    {
        // return \App\Personnel::orderBy('nom', 'asc')->where('etat', 2);
        return \App\Personnel::whereIn('etat', [2, 100])->orderBy('note', 'desc')->orderBy('fonction_id', 'asc');
    }

    static function attente()
    {
        // return \App\Personnel::orderBy('nom', 'asc')->where('etat', 1);
        return \App\Personnel::whereIn('etat', [1, 2])->orderBy('note', 'desc')->orderBy('fonction_id', 'asc');
    }

    static function formation()
    {
        // return \App\Personnel::orderBy('nom', 'asc')->where('etat', 0);
        return \App\Personnel::whereIn('etat', [0, 1, 2])->orderBy('prenoms', 'asc')->orderBy('nom', 'asc');
    }

    public function fonction()
    {
        return $this->belongsTo(Fonction::class);
    }

    public function abscences()
    {
        return $this->hasMany(Abscence::class);
    }

    public function absMois($mois)
    {
        return $this->abscences()->where([['date_abs','>=',session('campagne').'-'.$mois.'-01'],['date_abs','<=',session('campagne').'-'.$mois.'-31']])->get();
    }

    public function paies()
    {
        return $this->hasMany(Paie::class, 'personnel_id', 'id');
    }

    public function paiesMois($mois)
    {
        return $this->paies()->whereMonth('created_at',$mois)->whereYear('created_at',session('campagne'));
    }

    // --------------------------- many to many -----------------------------------
    public function directions()
    {
        // return $this->belongsToMany(Direction::class);
        // return $this->belongsToMany(Direction::class, 'affectations');
        return $this->belongsToMany(Direction::class, 'affectations', 'personnel_id', 'direction_id')
        ->withPivot('fonction_id', 'direction_id', 'personnel_id', 'team_number', 'etat', 'created_by', 'updated_at');
    }

    public function fonctions()
    {
        return $this->belongsToMany(Fonction::class, 'affectations', 'personnel_id', 'fonction_id')
        ->withPivot('fonction_id', 'direction_id', 'personnel_id', 'team_number', 'etat', 'created_by', 'updated_at');
    }


    public function affectations()
    {
        // return $this->belongsToMany(Personnel::class);
        // //  return $this->belongsToMany(Personnel::class)->as('subscription')->withTimestamps();

        // return $this->belongsToMany(Personnel::class, 'affectations', 'personnel_id', 'direction_id')
        return $this->belongsToMany('App\Affectation', 'affectations', 'personnel_id', 'direction_id')->withTimestamps();

    }

}
