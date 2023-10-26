<?php

namespace App\Http\Controllers;

use App\Paie;
use Illuminate\Http\Request;
use App\Personnel;
use Auth;
use App\Fonction;
use App\Option;
use Excel;
use App\Exports\PaieExport;
use App\Direction;
use App\Configuration;
class PaieController extends Controller
{
    protected $_paginate = 50;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fonctions = Fonction::get(['id','libelle']);

        $config = Configuration::selectTable('paies')->get(['labelle','level']);
        foreach($config as $a){
            $b[]=[$a->labelle => $a->level];
        }

        $config = collect($b)->collapse();


        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            if(isset($_GET['personnel'])){
                $personnels = Personnel::formation()->orderBy('nom','asc');
            }else{
                $personnels = Personnel::active()->orderBy('nom','asc');
            }
        }else{
            if(isset($_GET['personnel'])){
                $personnels = Personnel::myDirectionFormation()->orderBy('nom','asc');
            }else{

                $personnels = Personnel::myDirection()->orderBy('nom','asc');
            }
        }

        if ($request['search']) {
            $personnels = $personnels->where('matricule','LIKE',$request['search'].'%');
        }

        if ($request['fonction'] AND !empty($request['fonction']) ) {
            $personnels = $personnels->where('fonction_id', Fonction::where('libelle',$request['fonction'])->first()->id );
        }

        $personnels = $personnels->paginate($this->_paginate);

        $directions = Direction::all();

        // foreach($direction as $datas){
        //     if($datas->personnels->count() != 0 )
        //         $directions[]=$datas;
        // }

        $mois_default = (isset($_GET['mois']) ) ? $_GET['mois'] : date('m');
        foreach($personnels as $data){
            $data_array[]=Option::personalData($data,$mois_default);
        }

        if(!isset($data_array))
            $data_array = [];

        // $personnels = Personnel::active()->where('direction_id',Auth::user()->direction->id)->get();
        return view('admin.paies.index',['personnels'=> $data_array,'fonctions'=>$fonctions,'directions'=>$directions,'config'=>$config]);
    }

    public function list(Request $request)
    {
        $fonctions = Fonction::get(['id','libelle']);

        $config = Configuration::selectTable('paies')->get(['labelle','level']);
        foreach($config as $a){
            $b[]=[$a->labelle => $a->level];
        }

        $config = collect($b)->collapse();


        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            if(isset($_GET['personnel'])){
                $personnels = Personnel::formation()->orderBy('nom','asc');
            }else{
                $personnels = Personnel::active()->orderBy('nom','asc');
            }
        }else{
            if(isset($_GET['personnel'])){
                $personnels = Personnel::myDirectionFormation()->orderBy('nom','asc');
            }else{

                $personnels = Personnel::myDirection()->orderBy('nom','asc');
            }
        }

        if ($request['search']) {
            $personnels = $personnels->where('matricule','LIKE',$request['search'].'%');
        }


        if ($request['fonction'] AND !empty($request['fonction']) ) {
            $personnels = $personnels->where('fonction_id', Fonction::where('libelle',$request['fonction'])->first()->id );
        }

        $personnels = $personnels->paginate($this->_paginate);

        $directions = Direction::all();

        // foreach($direction as $datas){
        //     if($datas->personnels->count() != 0 )
        //         $directions[]=$datas;
        // }

        $mois_default = ( isset($_GET['mois']) ) ? $_GET['mois'] : date('m');
        foreach($personnels as $data){
            $data_array[]=Option::personalData($data,$mois_default);
        }

        if(!isset($data_array))
            $data_array = [];

        // $personnels = Personnel::active()->where('direction_id',Auth::user()->direction->id)->get();
        return view('admin.paies.list', ['personnels'=> $data_array,'fonctions'=>$fonctions,'directions'=>$directions,'config'=>$config]);
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
     * @param  \App\Paie  $paie
     * @return \Illuminate\Http\Response
     */
    public function show(Paie $paie)
    {
        //
    }

    public function prime(Request $request)
    {
        // dd($request->all());
        if(!isset($request['direction'])){
            $request['direction'] = Auth::user()->direction->id;
        }

        $mois_default = ( isset($request['mois']) ) ? $request['mois'] : date('m');
        $request['created_at']=  session('campagne').'-'.$mois_default.'-02';
        // dd($request['created_at']);

        if($request['fonction']){
            if($request['fonction'] == "*"){
                $personnels = Personnel::where(
                    'direction_id','=',$request['direction']
                )->get();
            }else{
                $personnels = Personnel::where([
                    ['fonction_id','=',$request['fonction']],
                    ['direction_id','=',$request['direction']],
                ])->get();
            }

            // dd($personnels);
            foreach($personnels as $personnel){
                $request['personnel_id'] = $personnel->id;
                $request[$request['primePaie']]=$request['montant'];
                Paie::create($request->except(['_token','primePaie','personnel','direction']));
            }

        }else{
            $personnel = Personnel::where([['matricule','=',$request['personnel']]])->first();
            $request['personnel_id'] = $personnel->id;

            Paie::create($request->except(['_token','primePaie','personnel','direction']));
        }

        // dd($request->all());
        flash('Ajouter avec succès')->success();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paie  $paie
     * @return \Illuminate\Http\Response
     */
    public function edit(Paie $paie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paie  $paie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paie $paie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paie  $paie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paie $paie)
    {
        //
    }

    public function export(){
        $mois_default = (int)$_GET['mois'];
        $fonction = $_GET['fonction'];
        $personnel = $_GET['personnel'];
        return Excel::download(new PaieExport($mois_default,$fonction,$personnel), 'Salaire personnels.xlsx');
    }
}
