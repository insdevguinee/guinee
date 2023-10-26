<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direction;
use App\Option;
use App\Caisse;
use App\Depense;
use App\Portefeuille;
use Carbon\Carbon;

class RecapController extends Controller
{
   	
    public function __construct()
    {
       
    }

    public function index()
    {
    	$mois_default = (isset($_GET['mois'])) ? $_GET['mois']:Carbon::now()->format('m');


    	$Tdirections=[];
    	$directions = Direction::all();
    	foreach ($directions as $d) {
	    	$salaires = 0;
			$netPayer = 0;
    	    foreach($d->activePersonnels as $data){
	            $salaires += $data->fonction->salaire;
	            $netPayer += @Option::personalData($data,$mois_default)['salaire'];

	        }
            $credit = Depense::depense()->where('direction_id',$d->id)->sum('credit');
            $debit = Depense::depense()->where('direction_id',$d->id)->sum('debit');
            $solde = Portefeuille::where('direction_id',$d->id)->whereYear('created_at',session('campagne'))->sum('montant');

	        $Tdirections[]=[
                'direction'=>$d->libelle,
                'salaire'=>$salaires,
                'netPayer'=>$netPayer,
                'personnels'=>$d->activePersonnels->count(),
                'portefeuille'=>$credit,
                //'portefeuille'=>@$d->portefeuilles->sum('montant'),
                //'sold'=>$credit - $debit
                 'sold'=>$debit - $credit
            ];
    	}


    	return view('admin.recap.index',['directions'=>$Tdirections]);
    }
}
