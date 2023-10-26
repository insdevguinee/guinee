<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use Auth;
use App\Direction;

class DirectionController extends Controller
{
    //
    public function index()
    {
    	return view('admin.directions.index',['directions'=>Direction::orderBy("libelle",'ASC')->paginate(50)]);
    }
    public function get(Request $request)
    {
        Session::put('direction', $request->direction);
        $user = Auth::user();
        $user->direction_id = $request->direction;
        $user->save();

        return back();
    }

    public function store(Request $request)
    {
    	$direction = new Direction;
    	$direction->libelle = $request['libelle'];
    	$direction->save();

    	flash('Direction créée')->success();

    	return back();
    }

    public function destroy($id)
    {
    	$d= Direction::findOrFail($id);
    	$d->delete();
    	flash('Supprimé')->success();
    	return redirect()->route('directions.index');
    }

}
