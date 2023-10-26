<?php

namespace App\Exports;

use App\Paie;
use Maatwebsite\Excel\Concerns\FromCollection;

class EtatExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Paie::all();
    }
}
