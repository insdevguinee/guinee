<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Excel;
use App\Imports\PersonnelsImport;
use App\Imports\PersonnelsImportAttente;
use App\Imports\PersonnelsImportFormation;
use App\Mail\Personel;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Exports\PersonnelExport; 
use App\Exports\PersoExport;

use App\Personnel;
use App\Fonction;
use App\Direction;
use App\Option;
use App\PersoRecrut;
use App\Affectation;

class PersonnelController extends Controller
{
    protected $_paginate = 100;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      
        // $personnels = Personnel::paginate($this->_paginate); 
        $fonctions = Fonction::get(['id','libelle']);
        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            $personnels = Personnel::active()->orderBy('note', 'desc');
        }else{
            $personnels = @Personnel::where([['direction_id',Auth::user()->direction->id],['etat',2]])->orderBy('note', 'desc');
        }

        $stat['total_personnels'] = $personnels->count();

        if ($request['fonction']) {
            $personnels = $personnels->where('fonction_id', Fonction::where('libelle',$request['fonction'])->first()->id );
        }

        if ($request['search']) {
            $personnels = $personnels->where('matricule','LIKE',$request['search'].'%');
        }
        $directions = Direction::all();       
        
        $personnels = $personnels->paginate($this->_paginate);
        $message = "";

        return view('admin.personnels.index',compact('personnels','stat','fonctions','directions'));
    }

    public function attente(Request $request)
    {
         $fonctions = Fonction::get(['id','libelle']);
        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            $personnels = Personnel::attente();
            $stat['total_personnels'] = Personnel::attente()->count();
        }else{
            // $personnels = Auth::user()->personnels();
            $personnels = @Personnel::where([['direction_id',Auth::user()->direction->id],['etat',1]]);
            $stat['total_personnels'] = Personnel::where([['direction_id',Auth::user()->direction->id],['etat',1]])->count();
        }
        if ($request['fonction']) {
            $personnels = $personnels->where('fonction_id', Fonction::where('libelle',$request['fonction'])->first()->id )->paginate($this->_paginate);
        }else{
            $personnels = $personnels->paginate($this->_paginate);
        }

        if ($request['search']) {
            $personnels = $personnels->where('matricule','LIKE',$request['search'].'%');
        }

        return view('admin.personnels.attente.index',compact('personnels','stat','fonctions'));
    }

    public function formation(Request $request)
    {
        $fonctions = Fonction::get(['id','libelle']);
        $level = 0;
        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            $personnels = Personnel::formation();
            $stat['total_personnels'] = Personnel::formation()->count();
            $level = 1;

        }else{
            // $personnels = Auth::user()->personnels();
            $personnels = @Personnel::where([['direction_id',Auth::user()->direction->id],['etat',0]]);
            $stat['total_personnels'] = Personnel::where([['direction_id', Auth::user()->direction->id],['etat', 0]])->count();
            $level = 2;
        }

        if ($request['fonction']){
            $personnels = $personnels->where('fonction_id', Fonction::where('libelle', $request['fonction'])->first()->id )->paginate($this->_paginate);
        }else{
            $personnels = $personnels->paginate($this->_paginate);
        }

        if ($request['search']) {
            $personnels = $personnels->where('matricule','LIKE', $request['search'].'%');
        }

        return view('admin.personnels.attente.formation',compact('personnels','stat','fonctions','level'));
    }

    public function importExportView()
    {
       return view('admin.personnels.import');
    }

    public function import() 
    {
        Excel::import(new PersonnelsImport, request()->file('personnels'));
        flash('Importer avec succès')->success();
        return redirect()->route('personnels.index');
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
        $request['fonction_id'] = $request['fonction'];
        $request['created_by'] = Auth::id();
        $personnel = new Personnel;
        $personnel->matricule = $request->matricule ;
        $personnel->nom = $request->nom ;
        $personnel->prenoms = $request->prenoms ;
        $personnel->mm_numero = $request->mm_numero ;
        $personnel->contact = $request->contact ;
        $personnel->direction_id = $request->direction_id ;
        $personnel->numero_equipe = $request->numero_equipe ;
        $personnel->fonction_id = $request->fonction_id ;
        $personnel->created_by = $request->created_by;
        // $personnel->create($request->except(['fonction','_token']));
        $personnel->save();
        flash('Personnel ajouté');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personnel  = Personnel::findOrFail($id);

        $fonctions = Fonction::get(['id','libelle']);
        $directions = Direction::all();
        $id = $id;
        return view('admin.personnels.edit', compact('personnel','fonctions','directions', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {
        if($request['etat']){
            if ($request['etat']=='Active') {
                 $personnel->update(['etat'=>2]);
                flash('Personnel activé');
            }
            elseif($request['etat']=='Formation'){
                 $personnel->update(['etat'=>0]);
                flash('Personnel mise en attente');
            }
            
            elseif($request['etat']=='X'){
                 $personnel->update(['etat'=>3]);
                flash('Personnel supprime');
            }            
            else{
                 $personnel->update(['etat'=>1]);
                flash('Personnel mise en attente');
            }
        }else{
            $pers = Personnel::where('contact', $request['contact'])->where('id','<>', $personnel->id)->get();
            if(count($pers) == 0){
                $request['fonction_id'] = $request['fonction'];
                $request['created_by'] = Auth::id();
                $personnel->update($request->except(['fonction','_token']));
                flash('Personnel modifié');   
                return redirect()->route('personnels.index');
            }else{
                flash('Impossible! ce numero de phone est deja attribue');   
            }
        }     
      
        // Mail::to('achi.a.evrard@gmail.com')->send(new Personel);
        return back();
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function modifier(Request $request, Personnel $personnel)
    {

        $id_personnel = $request->id;
        $personnel_a_zone = false;
        $message = "";

        $personnel = Personnel::findOrFail($id_personnel);


        foreach($request['direction_id'] as $key => $id_zone) {
            //$personnel  = Affectation::findOrFail($direction);
            if(!$this->verifier_si_personnel_est_dans_zone($id_zone, $id_personnel)) {
                $affectation = new Affectation;
                $affectation->direction_id = $id_zone;
                $affectation->personnel_id = $id_personnel;
                $affectation->fonction_id = $personnel->fonction->id;
                $affectation->team_number = $request['numero_equipe'][$key];
                $affectation->save();
                $message = "Personnel $personnel->nom $personnel->prenoms modifié(e) avec succès !!!";
            } 
        }

        

        // $personnels = Personnel::paginate($this->_paginate); 
        $fonctions = Fonction::get(['id','libelle']);
        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            $personnels = Personnel::active()->orderBy('note', 'desc');
        }else{
            $personnels = @Personnel::where([['direction_id',Auth::user()->direction->id],['etat',2]])->orderBy('note', 'desc');
        }

        $stat['total_personnels'] = $personnels->count();

        /*if ($request['fonction']) {
            $personnels = $personnels->where('fonction_id', Fonction::where('libelle',$request['fonction'])->first()->id );
        }*/

        if ($request['search']) {
            $personnels = $personnels->where('matricule','LIKE',$request['search'].'%');
        }
        $directions = Direction::all();       

        $personnels = $personnels->paginate($this->_paginate);

        return view('admin.personnels.index',compact('personnels','stat','fonctions','directions', 'message'));
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnel $personnel)
    {
        $personnel->delete();
        flash('Personnel Supprimé')->success();
        return back();
    }

    public function importFormation(Request $request)
    {       
        $personnels = [];
        return view('admin.personnels.importFormation');
    }

    public function postFormation(Request $request) 
    {
        $this->validate($request, [
            'personnels' => 'required|file|mimes:xls,xlsx'
        ]);

        $the_file = $request->file('personnels');

        try{
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 2, $row_limit );
            $column_range = range( 'F', $column_limit );
            $startcount = 2;

            foreach ($row_range as $row) {   
                $pers = Personnel::where('matricule', $sheet->getCell('A' . $row )->getFormattedValue()."")
                ->orWhere('contact', $sheet->getCell('D' . $row )->getFormattedValue()."")->get();
                if(count($pers) == 0){
                    // $perso_recrut = PersoRecrut::where('matricule', $sheet->getCell('A' . $row )->getFormattedValue()."")->get();
                    $etat = 0; // if(count($perso_recrut) == 0){ $etat = 4; }
                    Personnel::updateOrCreate(
                        ['matricule' => $sheet->getCell('A'. $row)->getFormattedValue()],
                        [
                            'prenoms' => $sheet->getCell('B'. $row)->getFormattedValue(), 
                            'nom' => $sheet->getCell('C'. $row)->getFormattedValue(),
                            'contact' => $sheet->getCell('D'. $row)->getFormattedValue(),
                            'note' => 0,
                            'etat' => $etat,
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
        return redirect()->route('personnels.formation');
    }
    
    /*public function postFormation() 
    {
        Excel::import(new PersonnelsImportFormation, request()->file('personnels'));
        flash('Importer avec succès')->success();
        return redirect()->route('personnels.formation');
    }*/

    public function importAttente(Request $request)
    {       
        $personnels = [];
        return view('admin.personnels.importAttente');
    }

    public function postAttente(Request $request)
    {
        $this->validate($request, [
            'personnels' => 'required|file|mimes:xls,xlsx'
        ]);

        $the_file = $request->file('personnels');

        try{
            // $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile("myExampleFile.xlsx");
            // $reader->load("spreadsheetWithCharts.xlsx", $reader::READ_DATA_ONLY | $reader::SKIP_EMPTY_CELLS);

            // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            // $reader->setLoadSheetsOnly(["Sheet 1", "My special sheet"]);
            // $spreadsheet = $reader->load("05featuredemo.xlsx");

            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 2, $row_limit );
            $column_range = range( 'F', $column_limit );
            $startcount = 2;
            $i = 0;

            foreach ($row_range as $row) {  $i++;              
                /*$flight = Personnel::updateOrCreate(
                    ['matricule' => $sheet->getCell('A' . $row )->getValue()],
                    [
                        'prenoms' => $sheet->getCell('B' . $row )->getValue(), 
                        'nom' => $sheet->getCell('C' . $row )->getValue(),
                        'contact' => $sheet->getCell('D' . $row )->getValue(),
                        'note' => $sheet->getCell('E' . $row )->getValue(),
                        'etat' => 1,
                        'created_by' => Auth::id(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()   
                    
                    ]
                );*/              

                // Personnel::where('matricule', $sheet->getCell('A' . $row)->getValue())

                // $fonction = Fonction::where('libelle', $sheet->getCell('A' . $row )->getFormattedValue()."")->get();
                // $fonction->id                
                $teams = explode(",", strval($sheet->getCell('I' . $row)->getFormattedValue()));
                $direction_ids = explode(",", strval($sheet->getCell('H' . $row)->getFormattedValue()));
                
                $matricule =  $sheet->getCell('A' . $row)->getFormattedValue()."";

                Personnel::where('matricule', $sheet->getCell('A' . $row)->getFormattedValue()."")
                ->update([
                    'prenoms' => $sheet->getCell('B' . $row)->getFormattedValue(),
                    'nom' => $sheet->getCell('C' . $row)->getFormattedValue(),
                    'contact' => $sheet->getCell('D' . $row)->getFormattedValue(),
                    'fonction_id' => intval($sheet->getCell('E' . $row)->getFormattedValue()),
                    'note' => $sheet->getCell('F' . $row)->getFormattedValue(),
                    'mm_numero' => $sheet->getCell('G' . $row)->getFormattedValue(),
                    'direction_id' => intval($sheet->getCell('H' . $row)->getFormattedValue()),
                    'numero_equipe' => $sheet->getCell('I' . $row)->getFormattedValue(),
                    'unity' => $sheet->getCell('J' . $row)->getFormattedValue(),
                    'areas' => $sheet->getCell('H' . $row)->getFormattedValue(),
                    'is_admited' => 1,
                    'rank' => $i,
                    'admited_at' => Carbon::now(),
                    'etat' => 1,
                    'created_by' => Auth::id(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);   

                PersoRecrut::where('matricule', $matricule)
                ->update([
                    'note2' => $sheet->getCell('F' . $row)->getFormattedValue(),
                    'fonction_id' => intval($sheet->getCell('E' . $row)->getFormattedValue()),
                    'is_admited' => 1,
                    'rank' => $i,
                    'admited_at' => Carbon::now()
                ]);  
                
                // foreach ($teams as $team_number){
                for ($j = 0; $j < count($teams); $j++){                    
                    // Log::error('teams : '.$teams[$j].'  direction : '.$direction_ids[$j]);                     
                    Affectation::updateOrCreate(
                    [
                        'personnel_id' => Personnel::where('matricule', $matricule)->get()->first()->id,
                        'fonction_id' => intval($sheet->getCell('E' . $row)->getFormattedValue()),
                        'direction_id' => intval($direction_ids[$j]),
                        'team_number' => $teams[$j]
                    ],
                    [
                        'etat' => 0,
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
        return redirect()->route('personnels.attente');
    }

    /*
    
    public function postAttente(Request $request) 
    {
        $this->validate($request, [
            'personnels' => 'required|file|mimes:xls,xlsx'
        ]);

        $the_file = $request->file('personnels');

        try{
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 2, $row_limit );
            $column_range = range( 'F', $column_limit );
            $startcount = 2;
            $data = array();
            foreach ($row_range as $row) {
                $data[] = [
                    'matricule' =>$sheet->getCell('A' . $row )->getValue(),
                    'prenoms' => $sheet->getCell('B' . $row )->getValue(),
                    'nom' => $sheet->getCell('C' . $row )->getValue(),

                    'etat' => 1,
                    'created_by' => Auth::id(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
        
                ];


                // Personnel::where('matricule', $sheet->getCell('C' . $row )->getValue())
                // ->update(['nom' => $sheet->getCell('C' . $row )->getValue()]);

                $flight = Personnel::updateOrCreate(
                    ['matricule' => $sheet->getCell('A' . $row )->getValue()],
                    [
                        'prenoms' => $sheet->getCell('B' . $row )->getValue(), 
                        'nom' => $sheet->getCell('C' . $row )->getValue(),
                        'etat' => 1,
                        'created_by' => Auth::id(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()   
                    
                    ]
                );

                // Personnel::where('matricule', $sheet->getCell('C' . $row )->getValue())
                // ->where('matricule', 'San Diego')
                // ->update(['nom' => $sheet->getCell('C' . $row )->getValue()]);

                $startcount++;
            }

            // Personnel::upsert($data, ['matricule'], ['nom']);
            // Personnel::insert($data);

        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data!');
        }
        return redirect()->route('personnels.attente');
    }
    
    
    public function postAttente() 
    {
        Excel::import(new PersonnelsImportAttente, request()->file('personnels'));
        flash('Importer avec succès')->success();
        return redirect()->route('personnels.attente');
    }*/

    public function activeActivite(Request $request)
    {       
        $personnels = [];
        $pers = Personnel::where('etat', 1)->where('rank','>', 0)->limit($request->number)->orderBy('rank', 'asc')->orderBy('note', 'desc')->get();
        if(count($pers) != 0){          
            foreach ($pers as $key => $p) {
                // Log::error('id : '.$p->id.' matricule : '.$p->matricule.' Auth : '.Auth::id()); 
                Personnel::updateOrCreate(
                    ['matricule' => $p->matricule.""],
                    [
                        'etat' => 2,
                    ]
                );  

                Affectation::updateOrCreate(
                    [
                        'personnel_id' => $p->id
                    ],
                    [
                        'etat' => 1,
                        'created_by' => Auth::id(),
                        'updated_at' => Carbon::now()                      
                    ]
                );

                // Affectation::where('personnel_id', $p->id)
                // ->update([
                //     'etat' => 1,
                //     'created_by' => Auth::id(),
                //     'updated_at' => Carbon::now()                      
                // ]);
            }
        }
        return redirect()->route('personnels.index');
    }

    public function destroyLog(Request $request, $id)
    {
        $personnel->update(['etat'=>3]);
        flash('Personnel supprime');
        // dd($id);
        return back();
    }

    public function export(Request $request, $etat=null, $fonction_name=null){
        // $mois_default = (int)$_GET['mois'];
        // $fonction = $_GET['fonction'];
        // $personnel = $_GET['personnel'];

        // Log::error('fonction_name : '.$fonction_name); 
        return Excel::download(new PersoExport($etat, $fonction_name), $fonction_name == "" ? 'personnels-en-activite.xlsx' : 'personnels-en-activite-'.strtolower($fonction_name).'.xlsx');
    }


    private function verifier_si_personnel_est_dans_zone($id_zone, $id_personnel){
        $affectations = Affectation::all();
        $personnel_est_dans_zone = false;

        foreach($affectations as $affectation) {
            if($affectation->personnel_id == $id_personnel && $affectation->direction_id==$id_zone) {
                $personnel_est_dans_zone = true;
            }
        }
        

        return $personnel_est_dans_zone;
    }

}
