<?php

namespace App\Exports;

use App\Depense;
use App\Paie;
use App\Personnel;
use Auth;
use App\Fonction;
use App\Option;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class DepenseExport implements FromCollection,ShouldAutoSize,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct()
    {
      
    }


    public function collection()
    {

        
        if (Auth::user()->can('all_personnels') OR Auth::user()->hasRole('admin|Admin')) {
            $depenses = Depense::depense()->get();
        }else{
            $depenses = Depense::depense()->where('direction_id',Auth::user()->id)->get();
        }

        $data_array[] = ['DATE', 'IMPUTATION', 'LIBELLE', 'N°FACTURE', 'TIERS', 'LIGNE','T. PAIEMENT','REFERENCE PAIEMENT','DEBIT','CREDIT'];
        foreach($depenses as $data){
        	$data_array[]=[
        		'DATE' =>@$data->date_en ,
        		'IMPUTATION' =>@$data->imputation_id ,
        		'LIBELLE' =>@$data->libelle ,
        		'N°FACTURE' =>@$data->num_facture ,
        		'TIERS' =>@$data->direction->libelle ,
        		'LIGNE' => $data->ligne_budget,
        		'T. PAIEMENT' =>$data->paiement ,
        		'REFERENCE PAIEMENT' =>$data->ref_paiement ,
        		'DEBIT' =>$data->debit ,
        		'CREDIT' =>$data->credit ,
        	];

        }
        return collect($data_array);
    }


    public function title(): string
    {
        return 'Depense';
    }
}
