<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 
use App\Fournisseur;
use App\Option;
use App\Caisse;
use Auth;
use App\Direction;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::paginate(50);        
        return view('admin.fournisseurs.index', compact('fournisseurs'));
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
        $request['slug'] = Option::superTrim($request['name']);
        $fournisseur = Fournisseur::create($request->except(['_token']));
        flash('Fournisseur Crée')->success();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
         if (Auth::user()->hasRole('admin|Admin')) {
            $direction = (isset($_GET['direction'])) ? $_GET['direction'] : Auth::user()->direction->id;
        }else{
            $direction = @Auth::user()->direction->id;
        }

        $directions = Direction::all();

        $etat['debit'] = Caisse::where([
            ['tiers',$fournisseur->id],
            ['direction_id',$direction],   
        ])->whereYear('created_at',session('campagne'))->sum('debit');
        $etat['credit']  = Caisse::where([
            ['tiers',$fournisseur->id],
            ['direction_id',$direction],   
        ])->whereYear('created_at',session('campagne'))->sum('credit');

        return view('admin.fournisseurs.show',compact('etat','fournisseur','directions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    // public function edit(Fournisseur $fournisseur)
    // {
    //     //
    // }

    public function edit($id)
    {
        $fournisseur  = Fournisseur::findOrFail($id);

        // $fonctions = Fonction::get(['id','libelle']);
        // $directions = Direction::all();
        return view('admin.fournisseurs.edit', compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)    
    {
        $frss = Fournisseur::where('codef', $request['codef'])->where('id','<>', $fournisseur->id)->get();
        if(count($frss) == 0){
            $request['created_by'] = Auth::id();
            $fournisseur->update($request->except(['_token']));
            // $fournisseur->update($request->except(['fonction','_token']));
            flash('Fournisseur modifié');   
            return redirect()->route('fournisseurs.index');
        }else{
            flash('Impossible! ce numero de phone est deja attribue');   
        }       
    }

    public function import(Request $request)
    {       
        $fournisseurs = [];
        return view('admin.fournisseurs.import');
    }

    public function importPost(Request $request) 
    {
        $this->validate($request, [
            'fic' => 'required|file|mimes:xls,xlsx'
        ]);

        $the_file = $request->file('fic');

        try{
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range(2, $row_limit);
            $column_range = range('F', $column_limit);
            $startcount = 2;

            foreach ($row_range as $row) {   
                $frss = Fournisseur::where('codef', $sheet->getCell('A' . $row )->getValue()."")->get();
                if(count($frss) == 0){
                    Fournisseur::updateOrCreate(
                        ['codef' => $sheet->getCell('A' . $row )->getValue()],
                        [
                            'name' => $sheet->getCell('B' . $row )->getValue(), 
                            'contact' => $sheet->getCell('C' . $row )->getValue(),
                            'email' => $sheet->getCell('D' . $row )->getValue(),
                            'slug' => $sheet->getCell('E' . $row )->getValue(),
                            'localisation' => $sheet->getCell('F' . $row )->getValue(),
                            'siteweb' => $sheet->getCell('G' . $row )->getValue(),
                            'created_by' => Auth::id(),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()                      
                        ]
                    );            
                }
                
            }
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data!');
        }
        return redirect()->route('fournisseurs.index');
    }
    

    public function list_frss()
    {
    	// $response = Http::get('https://erp.rgph.gov.gn/api/fournisseurs');  
    	// $jsonData = $response->json();      	
     	// dd($jsonData);

        // $client= new GuzzleHttp\Client();
        // $res= $client->request('GET','https://erp.rgph.gov.gn/api/fournisseurs');
        // dd($res->getBody());

        dd("diatas");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        flash('Fournisseur Supprimé')->success();
        return back();
    }
}
