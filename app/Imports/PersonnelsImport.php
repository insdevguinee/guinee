<?php

namespace App\Imports;

use App\Personnel;
use Maatwebsite\Excel\Concerns\ToModel;
use Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PersonnelsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    

    public function model(array $row)
    {

        $direction = (Auth::user()->hasRole('admin|Admin'))? $row['zone_activite'] : Auth::user()->direction->id;
        
        return new Personnel([
            'matricule' => $row['matricule'],
            'nom' => $row['nom'],
            'prenoms' => $row['prenoms'],
            'fonction_id' => $row['fonction'],
            'mm_numero' => $row['numero_mo'],
            'contact' => $row['contact'],
            'direction_id' => $direction,
            'numero_equipe' => $row['equipe'],
            'etat'=>$row['note'],
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
