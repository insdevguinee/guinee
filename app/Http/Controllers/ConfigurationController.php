<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;
use App\Paie;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Paie
        $config = Configuration::selectTable('paies')->get(['labelle','level']);
        foreach($config as $a){
            $b[]=[$a->labelle => $a->level];
        }
        $config = collect($b)->collapse();

        return view('admin.config.data',compact('config'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datas = [
            ['labelle' => "salaire", 'level' => ($request['salaire'] == 'on') ? 1: 0],
            ['labelle' => "prime", 'level' => ($request['prime'] == 'on') ? 1: 0],
            ['labelle' => "transport", 'level' => ($request['transport'] == 'on') ? 1: 0],
            ['labelle' => "mise_route", 'level' => ($request['mise_route'] == 'on') ? 1: 0],
            ['labelle' => "conges", 'level' => ($request['conges'] == 'on') ? 1: 0],
            ['labelle' => "gratification", 'level' => ($request['gratification'] == 'on') ? 1: 0],
            ['labelle' => "carburant", 'level' => ($request['carburant'] == 'on') ? 1: 0],
            ['labelle' => "guide", 'level' => ($request['guide'] == 'on') ? 1: 0],
            ['labelle' => "communication", 'level' => ($request['communication'] == 'on') ? 1: 0],
            ['labelle' => "perdiem", 'level' => ($request['perdiem'] == 'on') ? 1: 0],
            ['labelle' => "internet", 'level' => ($request['internet'] == 'on') ? 1: 0],
            ['labelle' => "prime_ni", 'level' => ($request['prime_ni'] == 'on') ? 1: 0],
            ['labelle' => "avance", 'level' => ($request['avance'] == 'on') ? 1: 0],
        ];

        foreach($datas as $data){
            Configuration::selectTable('paies')->where('labelle',$data['labelle'])->first()
                ->update([
                    'level'=>$data['level'],
                ]);
            if($data['labelle']!='salaire'){
                Paie::whereNotNull($data['labelle'])->update([
                    'actif'=> $data['level'],
                ]);
            }
                
        }
       
        return back();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
