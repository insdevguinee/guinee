<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    protected $fillable = [
    	'code', 'imputation_id', 'observation', 'num_facture', 'tiers', 'ligne_budget', 'paiement', 'ref_paiement','recu', 'debit', 'credit', 'user_id','direction_id','date_en','libelle','parent_id',
    ];

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imputation()
    {
        return $this->belongsTo(Imputation::class, 'imputation_id', 'code');
    }
    
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'tiers', 'id');
    }

    static function depense()
    {
        return \App\Caisse::where('type','depense')->whereYear('date_en',session('campagne'));
    }

    static function enregistrement()
    {
        return \App\Caisse::where('type','enregistrement')->whereYear('date_en',session('campagne'));
    }

    // public function child()
    // {
    //     return $this->belongsTo(Caisse::class);
    // }

    public function child()
    {
        return $this->hasOne(Caisse::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(Caisse::class, 'id', 'parent_id');
    }
}
