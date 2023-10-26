<?php

namespace App\Exports;

use App\Paie;
use App\Personnel;
use Auth;
use App\Fonction;
use App\Option;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;


class PaieExport implements FromCollection,ShouldAutoSize,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $mois_default, string $fonction, string $personnel)
    {
        $this->mois_default = $mois_default;
        $this->fonction = $fonction;
        $this->personnel = $personnel;
    }

    public function collection()
    {
        // $mois_default = 8;
        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            if($this->personnel == "formations"){
                $personnel_data = Personnel::formation();
            }else{
                $personnel_data = Personnel::active();
            }
        }else{
            if($this->personnel == "formations"){
                $personnel_data = Personnel::myDirectionFormation();
            }else{
                $personnel_data = Personnel::myDirection();
            }
        }

        if(!empty($this->fonction) AND $this->fonction !== 'all'){
            $personnel_data = $personnel_data->where('fonction_id', Fonction::where('libelle',$this->fonction)->first()->id )->get();
        }else{
            $personnel_data = $personnel_data->get();
        }


        $data_array[] = ['MATRICULE','MONTANT', 'NUMERO', 'NOMPRENOMS', 'DATE', 'INFOS', 'DIRECTION'];
        foreach($personnel_data as $data){
            if($data->etat == 2){
                $salaire = Option::personalData($data,$this->mois_default)['salaireformation'];
            }else{
                $salaire = Option::personalData($data,$this->mois_default)['salaire'];
            }
            $data_array[]=[
                'MATRICULE'=> $data->matricule,
                'MONTANT'=> @$salaire,
                'NUMERO'=> $data->mm_numero,
                'NOMPRENOMS'=> $data->nom.' '.$data->prenoms,
                'DATE'=>Carbon::now()->format('d/m/Y'),
                'INFOS'=> 'FRAIS DE FORMATION + FRAIS DE DEPOT',
                'DIRECTION'=> @$data->direction->libelle,
            ];
        }
        return collect($data_array);
    }

    public function title(): string
    {
        return 'Modele';
    }
}
