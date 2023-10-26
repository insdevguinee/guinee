<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portefeuille;
use Auth;

class PortefeuilleController extends Controller
{
    //

    public function store(Request $request)
    {
    	Portefeuille::create([
    		'direction_id' => $request->direction,
    		'montant' => $request->montant,
    		'user_id' => Auth::id(),
    	]);

    	flash('Montant ajouté')->success();
    	return back();
    }
}
