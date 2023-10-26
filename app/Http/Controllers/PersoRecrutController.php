<?php

namespace App\Http\Controllers;

use App\PersoRecrut;
use Illuminate\Http\Request;

class PersoRecrutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perso = PersoRecrut::all();  
        dd($perso);      
        // return view('admin.fournisseurs.index', compact('fournisseurs'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersoRecrut  $persoRecrut
     * @return \Illuminate\Http\Response
     */
    public function show(PersoRecrut $persoRecrut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersoRecrut  $persoRecrut
     * @return \Illuminate\Http\Response
     */
    public function edit(PersoRecrut $persoRecrut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersoRecrut  $persoRecrut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersoRecrut $persoRecrut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersoRecrut  $persoRecrut
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersoRecrut $persoRecrut)
    {
        //
    }
}
