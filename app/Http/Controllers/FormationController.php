<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;
use App\Personnel;
use Auth;
class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_paginate = 100;
    
    public function index(Request $request)
    {
        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            $personnels = Personnel::formation();
        }else{
            $personnels = @Personnel::myDirectionFormation();
        }


        if ($request['search']) {
            $personnels = $personnels->where([
                ['matricule','LIKE',$request['search'].'%'],
                ['etat',2]
            ]);
        }
        $personnels = $personnels->paginate($this->_paginate);
        return view('admin.abscences.formation',compact('personnels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $abscence = Formation::where([['personnel_id',$request->user],['date_abs',$request->date]])->first();
            if (!isset($abscence) and !isset($request->del)) {
                $abs = new Formation;
                $abs->personnel_id = $request->user;
                $abs->date_abs = $request->date;
                $abs->motif = $request->motif;
                $abs->created_by = Auth::id();
                $abs->save();
                return response()->json(['add',$abs->id,$abs->motif]);
            }else{
                $abscence->delete();
                return response()->json('delete');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        //
    }
}
