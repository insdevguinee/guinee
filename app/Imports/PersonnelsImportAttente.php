<?php

namespace App\Imports;

use App\Personnel;
use Maatwebsite\Excel\Concerns\ToModel;
use Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PersonnelsImportAttente implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    

    public function model(array $row)
    {
        // $direction = (Auth::user()->hasRole('admin|Admin'))? $row['zone_activite'] : Auth::user()->direction->id;
        
        return new Personnel([
            'matricule' => $row['matricule'],
            'nom' => $row['nom'],
            'prenoms' => $row['prenoms'],
            'contact' => $row['contact'],
            'note' => $row['note'],
            'etat' => 1,
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
