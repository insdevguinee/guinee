<?php

namespace App\Exports;

use App\Direction;
use App\Personnel;
use Auth;
use App\Fonction;
use App\Option;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class PersonnelExport implements FromCollection,ShouldAutoSize,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $direction)
    {
        $this->direction = $direction;
    }


    public function collection()
    {
 
        $personnels = $this->direction == 0 ? Personnel::all() : Personnel::where('direction_id', $this->direction)->get();
        $data_array[] = ['matricule','nom', 'prenoms', 'fonction', 'numero', 'contact', 'direction','Equipe','etat','Sup','Date'];
        foreach($personnels as $personnel){           
    
            $data_array[]=[
                'matricule' => $personnel['matricule'],
                'nom' => $personnel['nom'],
                'prenoms' => $personnel['prenoms'],
                'fonction' => $personnel['fonction_id'],
                'numero' => $personnel['mm_numero'],
                'contact' => $personnel['contact'],
                'direction' => $personnel['direction_id'],
                'Equipe' => $personnel['numero_equipe'],
                'etat'=>$personnel['etat'],
                'Sup' => $personnel['created_by'],
                'date' => $personnel['created_at'],
            ];
        }
        return collect($data_array);
    }


    public function title(): string
    {
        return 'Modele';
    }
}
