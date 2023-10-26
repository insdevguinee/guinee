<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
    protected $fillable = [
    	'id','libelle','salaire','level','created_at','updated_at','model',
    ];

    static function selectTable($data){
    	return \App\Configuration::where('model',$data);
    }
}
