<?php

namespace App\Http\Controllers;

use App\Campagne;
use Illuminate\Http\Request;
use Session;

class CampagneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Session::put('campagne', $request->campagne);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campagne  $campagne
     * @return \Illuminate\Http\Response
     */
    public function show(Campagne $campagne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campagne  $campagne
     * @return \Illuminate\Http\Response
     */
    public function edit(Campagne $campagne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campagne  $campagne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campagne $campagne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campagne  $campagne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campagne $campagne)
    {
        //
    }
}
