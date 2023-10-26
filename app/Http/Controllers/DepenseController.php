<?php

namespace App\Http\Controllers;

use App\Depense;
use Illuminate\Http\Request;
use Auth;
use App\Imputation;
use App\Budget;
use App\Fournisseur;
use App\Option;
use Carbon\Carbon;
use App\Direction;
use App\Portefeuille;
use App\Exports\DepenseExport;
use Excel;

class DepenseController extends Controller
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

        $caisses = @Depense::depense()->where('direction_id',$direction)->orderBy('id','desc')->paginate(100);

        $etat['debit'] = Depense::depense()->where('direction_id',$direction)->sum('debit');
        $etat['credit']  = Depense::depense()->where('direction_id',$direction)->sum('credit');

        $etat['solde'] = Portefeuille::where('direction_id',$direction)->whereYear('created_at',session('campagne'))->sum('montant');

        $fournisseurs = Fournisseur::orderBy('name','desc')->get();
        $directions = Direction::get(['id','libelle']);


        return view('admin.depenses.index',compact('caisses','etat','fournisseurs','directions'));
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
        
        $data = new Depense;
        $data->type = 'depense';
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
            $data->recu = Option::fichier('recupdf',Auth::user()->direction->libelle.'_facture',$request);
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
        $caisse = Depense::depense()->findOrFail($id);
        $fournisseurs = Fournisseur::all();
        return view('admin.depenses.edit',compact('caisse','fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     if ($request->operation =='debit') {
    //         $request['debit'] = $request->montant;
    //         $request['credit'] = NULL;
    //     }else{
    //         $request['debit'] = NULL;
    //         $request['credit'] = $request->montant;
    //     }
    //     $caisse = Depense::depense()->findOrFail($id);
    //     $caisse->update([
    //         'imputation_id' => $request['imputation'],
    //         'observation' => $request['observation'],
    //         'num_facture' => $request['num_facture'],
    //         'tiers' => $request['tiers'],
    //         'ligne_budget' => $request['ligne_budget'],
    //         'paiement' => $request['paiement'],
    //         'ref_paiement' => $request['ref_paiement'],
    //         'debit' => $request['debit'],
    //         'credit' => $request['credit'],
    //         'date_en' => $request['date_en'],
    //         'libelle' => $request['libelle'],
    //     ]);
    //     if(isset($request->recupdf)){
    //          $recu = Option::fichier('recupdf','facture',$request);
    //     }

    //     if($request->has('recupdf'))){
    //         $fichierpdf = Option::fichier('recupdf','facture',$request);
    //         $caisse->update([
    //             'recu' => $fichierpdf,
    //         ]); 
    //     }

    //     flash('Enregistrement modifié')->success();
    //     return back();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depense $depense)
    {
        // $caisse = Depense::findOrFail($id);
      

        // $caisse->delete();
        $depense->delete();
        $depense2 = Depense::where('parent_id',$depense->id)->first();
        if($depense2){
            $depense2->delete();
        }
        flash('Enregistrement supprimé')->success();
        return back();
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

    public function export(){
        return Excel::download(new DepenseExport, 'Depenses.xlsx');
    }
}
