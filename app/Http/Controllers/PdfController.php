<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Redirect;
use PDF;
use App\Option;
use Auth;
use App\Personnel;
use Carbon\Carbon;
use App\Fonction;
use App\Conducteur;
use App\Engin;
use App\Direction;

class PdfController extends Controller
{
   	public function pdfForm()
    {
    	$m = 9;
        $f = 'all';
        $infos=[
            'date'=> '02-'.$m.'-'.session('campagne'),
            'mois'=> $m,
            'departement' => Auth::user()->direction->libelle,
            'annee'=>session('campagne'),
        ];

 		$users = $this->pdfdowloadform($m,$f,$p);
 		
       	return view('admin.paies.pdf',['users'=>$users,'infos'=>$infos]);
    }

    public function pdfDownload(Request $request){
        // dd($request);
    	$m = (int)$request['mois'];
        $f = $request['fonction'];
        $p = $request['personnel'];
        $d = $request['direction'];

        if($request['matricule']){
            $data = Personnel::where('matricule',$request['matricule'])->first();
            // dd($data);
            $users[] = Option::personalData($data,$m);
           
        }else{
            $users = $this->pdfdowloadform($m,$f,$p);
        }

        $infos=[
            'date'=> '02-'.$m.'-'.session('campagne'),
            'mois'=> $m,
            'departement' => Auth::user()->direction->libelle,
            'annee'=>session('campagne'),
        ];

       	$pdf = PDF::loadView('admin.paies.pdf',['users'=>$users,'infos'=>$infos])->setPaper('a4', 'landscape');
       	return $pdf->download('ETAT-DE-PREMIERE.pdf');
    }

    private function pdfdowloadform($m,$f,$p){
    	$mois_default = $m;
        $fonction = $f;
        
    	if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            if ($p == "formations") {
                $personnel_data = Personnel::formation()->orderBy('nom','asc');
            }else{
                $personnel_data = Personnel::active()->orderBy('nom','asc');
            }
        }else{
             if ($p == "formations") {

                 $personnel_data = myDirectionFormation::myDirection()->orderBy('nom','asc');
            }else {
                 $personnel_data = Personnel::myDirection()->orderBy('nom','asc');
                # code...
             }
        }
        if(!empty($fonction) AND $fonction !== 'all'){
            $personnel_data = $personnel_data->where('fonction_id', $fonction )->get();
        }else{
            $personnel_data = $personnel_data->get();
        }

        foreach($personnel_data as $data){
            $data_array[]= Option::personalData($data,$mois_default);
        }

        if(!isset($data_array)){
            $data_array[]=[];
        }

        return $data_array;
    }

    public function pdfOm($id, $team_id = null)
    {
        // if ($team_id) {
        //     return "Profil de l'utilisateur : " . $utilisateur;
        // } else {
        //     return "Profil par défaut";
        // }

        $personnel = Personnel::findOrFail($id);
        if(empty($personnel->numero_equipe)){
            $personnels = Personnel::where('id',$personnel->id)->get();
        }else{
            $personnels = Personnel::where([
                ['numero_equipe',$personnel->numero_equipe],
                ['direction_id',$personnel->direction_id]
            ])->orderBy('priority', 'desc')->get();
            // ->orderBy('libelle', 'desc')
        }

        // $conducteur = Conducteur::where('supervisor_id', $personnel->id)->first();
        $conducteur = Conducteur::where('number_team', $personnel->numero_equipe)->first();
        $engins = Engin::where('number_team', $personnel->numero_equipe)->get();

        $pdf = PDF::loadView('admin.personnels.ompdf',['personnels'=>$personnels, 'conducteur'=>$conducteur, 'engins'=>$engins])->setPaper('a4');
        return $pdf->download('ORDRE-DE-MISSION-EQUIPE-'.$personnel->numero_equipe.'-'.strtoupper($personnel->direction->libelle).'.pdf');
    }    

    public function pdfOm2($id)
    {
        $personnel = Personnel::findOrFail($id);
        if(empty($personnel->numero_equipe)){
            $personnels = Personnel::where('id',$personnel->id)->get();
        }else{
            $personnels = Personnel::where([
                ['numero_equipe',$personnel->numero_equipe],
                ['direction_id',$personnel->direction_id]
            ])->orderBy('priority', 'desc')->get();
            // ->orderBy('libelle', 'desc')
        }

        $areas = explode(',', $personnels->first()->areas);
        $directions = Direction::whereIn('id', $areas)->get();
        // $areas = Personnel::where([
        //     ['numero_equipe',$personnel->numero_equipe],
        //     ['direction_id',$personnel->direction_id]
        // ])->orderBy('priority', 'desc')->first()->areas;

        // $conducteur = Conducteur::where('supervisor_id', $personnel->id)->first();
        $conducteur = Conducteur::where('number_team', $personnel->numero_equipe)->first();
        $engins = Engin::where('number_team', $personnel->numero_equipe)->get();

        $pdf = PDF::loadView('admin.personnels.ompdf',['personnels'=>$personnels, 'conducteur'=>$conducteur, 'engins'=>$engins, 'directions'=>$directions])->setPaper('a4');
        return $pdf->download('ORDRE-DE-MISSION-EQUIPE-'.$personnel->numero_equipe.'-'.strtoupper($personnel->direction->libelle).'.pdf');
    }

    public function pdfOm1($id)
    {
        $personnel = Personnel::findOrFail($id);
        if(empty($personnel->numero_equipe)){
            $personnels = Personnel::where('id',$personnel->id)->get();
        }else{
            $personnels = Personnel::where([
                ['numero_equipe',$personnel->numero_equipe],
                ['direction_id',$personnel->direction_id]
            ])->where('etat', '<>', 3)->orderBy('priority', 'desc')->get();
            // ->orderBy('libelle', 'desc')
        }

        $areas = explode(',', $personnels->first()->areas);
        $directions = Direction::whereIn('id', $areas)->get();
        // $areas = Personnel::where([
        //     ['numero_equipe',$personnel->numero_equipe],
        //     ['direction_id',$personnel->direction_id]
        // ])->orderBy('priority', 'desc')->first()->areas;
        // $conducteur = Conducteur::where('supervisor_id', $personnel->id)->first();
        $conducteurs = Conducteur::where('number_team', $personnel->numero_equipe)->get();
        $engins = Engin::where('number_team', $personnel->numero_equipe)->get();

        $pdf = PDF::loadView('admin.personnels.ompdf1',['personnels'=>$personnels, 'conducteurs'=>$conducteurs, 'engins'=>$engins, 'directions'=>$directions])->setPaper('a4');
        return $pdf->download('ORDRE-DE-MISSION-EQUIPE-'.$personnel->numero_equipe.'-'.strtoupper($personnel->direction->libelle).'.pdf');
    }

    public function pdfOrdreMission($direction_id, $team_id = null)
    {
        if(!empty($team_id) && !empty($direction_id)) {

            // $resultats = DB::select('SELECT * FROM personnels WHERE colonne = ?', ['valeur']);        

            // $personnels = Personnel::where('etat', 2)
            // ->first()
            // ->directions()
            // ->wherePivot('direction_id', '=', $direction_id)
            // ->wherePivot('team_number', '=', $team_id)
            // ->get();    

            // Log::error("direction_id : ".$direction_id."   team_id : ".$team_id);

            // $personnels = Personnel::where('id',$personnel->id)->get();
            $personnels = Personnel::join('affectations', 'personnels.id', '=', 'affectations.personnel_id')
            ->distinct()
            ->select('affectations.fonction_id', 'affectations.direction_id', 'affectations.personnel_id', 'affectations.team_number', 'affectations.etat',
            'personnels.matricule', 'personnels.nom', 'personnels.prenoms', 'personnels.mm_numero', 'personnels.contact','affectations.direction_id AS default_direction_id', 
            'personnels.note', 'personnels.is_admited', 'admited_at','personnels.rank','personnels.priority','affectations.fonction_id AS default_fonction_id', 
            'personnels.unity', 'personnels.areas')
            ->where('personnels.etat', 2)
            ->where('affectations.direction_id', '=', $direction_id)
            ->where('affectations.team_number', '=', $team_id)
            ->get();
                    
            $personnel = $personnels[0];
            // Log::error($personnel->team_number);        
            $conducteurs = Conducteur::where('number_team', $team_id)->get();
            $engins = Engin::where('number_team', $team_id)->get();

            $pdf = PDF::loadView('admin.personnels.ompdf', ['personnels'=>$personnels, 'conducteurs'=>$conducteurs, 'engins'=>$engins])->setPaper('a4');
            return $pdf->download('ORDRE-DE-MISSION-EQUIPE-'.$personnel->team_number.'-'.strtoupper($personnel->direction->libelle).'.pdf');

        } else {
            return redirect()->route('personnels.index');        
        }
    }
    
    public function generateallompdf($team_id)
    {
        $personnel = Personnel::findOrFail($team_id);

        if(empty($personnel->numero_equipe)){
            $personnels = Personnel::where('id',$personnel->id)->get();
        }else{
            $personnels = Personnel::where([
                ['numero_equipe',$personnel->numero_equipe],
                ['direction_id',$personnel->direction_id]
            ])->get();
        }
        $pdf = PDF::loadView('admin.personnels.generateallompdf',['personnels'=>$personnels])->setPaper('a4');
        return $pdf->download('ORDRE DE MISSION.pdf');
    }


    // public function generatePDF()
    // {
    //     $pdf = PDF::loadView('pdf.template', ['data' => $data]);

    //     // Ajoutez un pied de page personnalisé
    //     $pdf->setOptions(['isPhpEnabled' => true]);
    //     $pdf->setPaper('A4');
    //     $pdf->setFooter(view('pdf.footer'));

    //     return $pdf->stream('document.pdf');
    // }

}
