<?php

namespace App\Http\Controllers;

use App\Abscence;
use Illuminate\Http\Request;
use App\Personnel;
use Auth;

class AbscenceController extends Controller
{

     protected $_paginate = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            $personnels = Personnel::active();
        }else{
            $personnels = @Personnel::where([['direction_id',Auth::user()->direction->id],['etat',1]]);
        }


        if ($request['search']) {
            $personnels = $personnels->where([
                ['matricule','LIKE',$request['search'].'%'],
                ['etat',1]
            ]);
        }
        $personnels = $personnels->paginate($this->_paginate);
        return view('admin.abscences.index',compact('personnels'));
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
            $abscence = Abscence::where([['personnel_id',$request->user],['date_abs',$request->date]])->first();
            if (!isset($abscence) and !isset($request->del)) {
                $abs = new Abscence;
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
     * @param  \App\Abscence  $abscence
     * @return \Illuminate\Http\Response
     */
    public function show(Abscence $abscence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abscence  $abscence
     * @return \Illuminate\Http\Response
     */
    public function edit(Abscence $abscence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abscence  $abscence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abscence $abscence)
    {
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abscence  $abscence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abscence $abscence)
    {
        //
    }
}
