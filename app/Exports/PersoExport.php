<?php

namespace App\Exports;
use App\Direction;
use App\Personnel;
use Auth;
use App\Fonction;
use App\Option;

use Maatwebsite\Excel\Concerns\FromCollection;

class PersoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(int $etat = null ,string $fonction_name = null)
    {
        $this->fonction_name = $fonction_name;
        $this->etat = $etat;
    }

    public function collection()
    { 
        $personnels = $this->fonction_name == "" ? Personnel::where('etat', $this->etat)->get() : Personnel::where('etat', $this->etat)->where('fonction_id', Fonction::where('libelle', $this->fonction_name)->first()->id)->get();
        // $personnels = $this->fonction_name == "" ? Personnel::where('etat', $this->etat)->get() : Personnel::active()->where('etat', $this->etat)->where('fonction_id', Fonction::where('libelle', $this->fonction_name)->first()->id)->get();
        // $personnels = $this->fonction_name == "" ? Personnel::where("etat", 2) : Personnel::where("etat", 2)->where('fonction_id', Fonction::where('libelle', $this->fonction_name).first()->id)->get();
        $data_array[] = ['Matricules','Noms', 'Prenoms', 'Fonctions', 'N° Orange Money', 'Contacts', 'Directions','Equipes'];
        foreach($personnels as $personnel){              
            $data_array[] = [
                'Matricules' => $personnel['matricule'],
                'Noms' => strtoupper(trim($personnel['nom'])),
                'Prenoms' => ucwords(trim($personnel['prenoms'])),
                // 'Fonctions' => $personnel['fonction_id'],
                'Fonctions' => ucwords(trim(@Fonction::where('id', $personnel['fonction_id'])->first()->libelle)),
                'N° Orange Money' => trim($personnel['mm_numero']),
                'Contacts' => trim($personnel['contact']),
                // 'Directions' => $personnel['direction_id'],
                'Directions' => ucwords(trim(@Direction::where('id', $personnel['direction_id'])->first()->libelle)),
                'Equipes' => trim($personnel['numero_equipe']),
            ];
        }
        return collect($data_array);
    }
}
