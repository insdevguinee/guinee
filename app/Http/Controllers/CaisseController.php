<?php

namespace App\Http\Controllers;

use App\Caisse;
use Illuminate\Http\Request;
use Auth;
use App\Imputation;
use App\Budget;
use App\Fournisseur;
use App\Option;
use Carbon\Carbon;
use App\Direction;

class CaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       
    }


    public function index()
    {   

        if (Auth::user()->hasRole('admin|Admin')) {
            $direction = (isset($_GET['direction'])) ? $_GET['direction'] : Auth::user()->direction->id;
        }else{
            $direction = @Auth::user()->direction->id;
        }

        $caisses = @Caisse::enregistrement()->where('direction_id',$direction)->orderBy('id','desc')->paginate(100);
        $etat['debit'] = Caisse::enregistrement()->where('direction_id',$direction)->sum('debit');
        $etat['credit']  = Caisse::enregistrement()->where('direction_id',$direction)->sum('credit');
        $fournisseurs = Fournisseur::orderBy('name','desc')->get();

        $directions = Direction::get(['id','libelle']);
        
        return view('admin.caisses.index',compact('caisses','etat','fournisseurs','directions'));
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
        // dd($request->date_en);
        $ligne_budget = trim( explode('-',$request->ligne_budget)[0] ) ;
        
        $data = new Caisse;
        $data->code = rand();
        $data->imputation_id = explode('-',$request->imputation)[0] ;
        $data->observation = @$request->observation;
        $data->num_facture = @$request->num_facture;
        $data->tiers = @$request->tiers;
        $data->ligne_budget = $ligne_budget;
        $data->paiement = @$request->paiement;
        $data->ref_paiement = @$request->ref_paiement;
        $data->libelle = @$request->libelle;
        if(isset($request->recupdf)){
            $data->recu = Option::fichier('recupdf','facture',$request);
        }

        if ($request->operation =='debit') {
            $data->debit = $request->montant;
            $data->credit = NULL;
        }else{
            $data->debit = NULL;
            $data->credit = $request->montant;
        }
        $data->date_en = $request->date_en;
        $data->user_id = Auth::id();
        $data->direction_id = Auth::user()->direction->id;
        $data->save();
        // 
        $data2 = new Caisse;
        $data2->code = rand();
        $data2->num_facture = @$request->num_facture;
        if ($request->operation =='debit') {
            $data2->debit = NULL;
            $data2->credit = $request->montant;
        }else{
            $data2->debit = $request->montant;
            $data2->credit = NULL;
        }
        $data2->ref_paiement = @$request->ref_paiement;
        $data2->date_en = $request->date_en;
        $data2->parent_id = $data->id;
        $data2->imputation_id = $data->imputation_id;
        $data2->tiers =  $data->tiers;
        $data2->user_id = Auth::id();
        $data2->direction_id = Auth::user()->direction->id;
        $data->libelle = @$data->libelle;
        $data2->save();

        // 

        flash('Donnée enregistrée avec succès')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function show(Caisse $caisse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caisse = Caisse::findOrFail($id);
        $fournisseurs = Fournisseur::all();
        return view('admin.caisses.edit',compact('caisse','fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->operation =='debit') {
            $request['debit'] = $request->montant;
            $request['credit'] = NULL;
        }else{
            $request['debit'] = NULL;
            $request['credit'] = $request->montant;
        }

        $caisse = Caisse::findOrFail($id);
        $caisse2 = $caisse->child();
        
        if(isset($request->recupdf)){
            $recu = Option::fichier('recupdf','facture',$request);
            $caisse->recu = $recu;
        }

        
            $caisse->imputation_id = $request['imputation'];
            $caisse->observation = $request['observation'];
            $caisse->num_facture = $request['num_facture'];
            $caisse->tiers = $request['tiers'];
            $caisse->ligne_budget =  trim( explode('-',$request['ligne_budget'])[0] );
            $caisse->paiement = $request['paiement'];
            $caisse->ref_paiement = $request['ref_paiement'];
            $caisse->debit = $request['debit'];
            $caisse->credit = $request['credit'];
            $caisse->date_en = $request['date_en'];
            $caisse->libelle = $request['libelle'];
            $caisse->save();
 
        // $caisse2->update([
        //     'imputation_id' =>$caisse->imputation_id,
        //     'tiers' => $caisse->tiers,
        //     'observation' => $caisse->observation,
        //     'num_facture' => $caisse->num_facture,
        //     'paiement' => $caisse->paiement,
        //     'ref_paiement' => $caisse->ref_paiement,
        //     'debit' =>  $request['credit'],
        //     'credit' => $request['debit'],
        //     'date_en' => $caisse->date_en,
        //     'libelle' => $caisse->libelle,

        // ]);
        

        flash('Enregistrement modifié')->success();
            // dd("pk");
            if($caisse->type =="depense"){
                return redirect()->route('depenses.index');
            }
            return redirect()->route('caisses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse $caisse)
    {
        $caisse2 = Caisse::where('parent_id',$caisse->id)->first();
        if(count($caisse2)>0)
            $caisse2->delete();
        $caisse->delete();
        flash('Enregistrement supprimé')->success();
        return redirect()->route('depenses.index');
    }

    public function getImputation(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request['query'];
            if ($query != null) {
                $imputations = Imputation::where('code','LIKE',$query.'%')->orderBy('code','ASC')->get();
                if (isset($imputations)) {
                    foreach ($imputations as $row) {
                        $output .='<li class="list-group-item"> <span data="code">'.$row->code.'</span> - <span data="libelle">'.$row->libelle.'</span></li>';
                    }
                }
                else{
                    $output = '<li class="list-group-item" >Aucune correspondance</li>';
                } 
            }

            $resultat = ['list_data' => $output];

            return response()->json($resultat['list_data']);
        }
    }

    public function getBudget(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request['query'];
            if ($query != null) {
                $imputations = Budget::where('ligne_budget','like',$query.'%')->orderBy('ligne_budget')->take(5)->get();
                if (isset($imputations)) {
                    foreach ($imputations as $row) {
                        $output .='<li class="list-group-item"> <span data="ligne_budget">'.$row->ligne_budget.'</span> - <span data="libelle">'.$row->libelle.'</span></li>';
                    }
                }
                else{
                    $output = '<li class="list-group-item" >Aucune correspondance</li>';
                } 
            }

            $resultat = ['list_data' => $output];

            return response()->json($resultat['list_data']);
        }
    }
}
