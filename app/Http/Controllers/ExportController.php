<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Excel;
use App\Direction;
use App\Fonction;
use App\Exports\PersonnelExport;
use Illuminate\Http\Request;
class ExportController extends Controller
{
    public function personnel() {

        if (Auth::user()->hasRole('admin|Admin')) {
            $cats = Direction::all();
        }else{
            $cats = Auth::user()->directions;
        }

       return view('admin.personnels.export',['cats'=>$cats]); 
    }

    public function downloadPersonnel(Request $request) {
        
        $direction =  $request['cat'] == 0 ? 0 : $request['cat'];
        return Excel::download(new PersonnelExport($direction), 'Liste du personnel.xlsx');

    }

    public function paiement() {
        if (Auth::user()->hasRole('admin|Admin')) {
            $directions = Direction::all();
        }else{
            $directions = Auth::user()->directions;
        }

        $fonctions = Fonction::all();
        return view('admin.paies.export',['directions'=>$directions,'fonctions'=>$fonctions]);
    }

    public function paiementexport(Request $request) {
        $m = $request['mois'];
        $f = $request['fonction'];
        $p = $request['personnel'];

        $users = $this->pdfdowloadform($m,$f,$p)[0];
        $infos = $this->pdfdowloadform($m,$f,$p)[1];
        $pdf = PDF::loadView('admin.paies.pdf',['users'=>$users,'infos'=>$infos])->setPaper('a4', 'landscape');
        return $pdf->download('ETAT DE PREMIERE.pdf');
        
    }
}