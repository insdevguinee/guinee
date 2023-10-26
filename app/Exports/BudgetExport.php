<?php

namespace App\Exports;

use App\Budget;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Caisse;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class BudgetExport implements FromCollection,ShouldAutoSize,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$budgets = Budget::all();
        $data_array[] = ['CODE1', 'CODE2', 'LIGNE BUDGET', 'COMPTA', 'PHASE OPERATION','LIBELLE' ,'MONTANT'];
        foreach($budgets as $data){
        	$data_array[]=[
        		'CODE1' => $data->code1,
        		'CODE2' => $data->code2,
        		'LIGNE BUDGET' => $data->ligne_budget,
        		'COMPTA' => $data->compta,
        		'PHASE OPERATION' => $data->phase_operation,
        		'LIBELLE' =>  $data->libelle ,
        		'MONTANT' =>  Caisse::where('ligne_budget',$data->ligne_budget)->whereYear('created_at',session('campagne'))->sum('debit'),

        	];

        }
        return collect($data_array);
    }

    public function title(): string
    {
        return 'Budget';
    }
}
