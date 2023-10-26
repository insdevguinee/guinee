<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Objet;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    //
    
    function objets()
    {
    	$objets = Objet::paginate(20);
    	return response()->json($objets);
    }

    function objetsShow($id)
    {
    	return response()->json(Objet::findOrFail($id));
    }
}
