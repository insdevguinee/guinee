<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Config;

class Option extends Model
{
    //

    static function mois(){
        return ['Janvier'=>1,'Fevrier'=>2,'Mars'=>3,'Avril'=>4,'Mai'=>5,'Juin'=>6,'Juillet'=>7,'Aout'=>8,'Septembre'=>9,'Octobre'=>10,'Novembre'=>11,'Decembre'=>12];
    }

    static function fonctions(){
        return ["AGENT CARTOGRAPHE","CHEF D'EQUIPE","agent de saisie","aide formateur"];
    }

    static function superTrim($string)
    {
        // $string = trim($string); 
        $string = str_replace(['\t',';',':',',','@','/','[',']','{','}','^','¨','\'','"','#','=','_','$','£','°','?','!','%','«','»','(',')',' '],'',$string);
        $string = str_replace(['é','è','ê','Ê','Ë'], 'e',$string);
        $string = str_replace(['à','ä','â','Â','Ä'],'a', $string);
        $string = str_replace(['û','ù','ü','Û','Ü'],'u', $string); 
        // o i 
        $string = preg_replace('/\s/', '', $string); 
        $string = trim($string); 

        return  strtolower($string);           
    }

    static function slug($string)
    {
        $string = \App\Option::superTrim($string);
        $slug = User::where('slug',$string)->count();
        if ($slug) {
            $number = $slug-1;
            $string = $string.$number;
        }
        return $string;
    }

    static function calcul_frais_mtn($montant)
    {
       $tablemtn = [
 
		 	    [2000,100],
          [5000,150],
          [9000,450],
		 [25000,550],
          [10000,500],
          [100000,1000],
          [500000,1],
          [2000000,5000],
       ];

       foreach ($tablemtn as $value) {
        if ($montant <=$value[0]) {
            if($value[1]==1){
                return $montant * 0.01;
            }else{
               return $value[1]; 
            }
        }
       }
      return 0;
    }

    static function cn($brf)
    {
        if( $brf * 0.8 <= 50000 & $brf>= 0 ){
          return 0;
        }elseif ($brf *0.8 <= 130000 & $brf> 50000 ) {
          return $brf *0.8*0.015 - 750;
        }elseif ($brf *0.8 <= 200000 & $brf> 130000 ) {
          return $brf *0.8 * 0.05 - 5300;
        }else{
          return $brf *0.8 * 0.1 - 15300;
        }
    }


// =SI((Q5*0,8)<=50000;
//     0;
//     SI((Q5*0,8)<=130000;
//         (Q5*0,8)*1,5%-750;
//         SI((Q5*0,8)<=200000;
//             (Q5*0,8)*5%-5300;
//             (Q5*0,8)*10%-15300))
// )

    static function igr($base_igr,$n_part)
    {
        $value = $base_igr/$n_part;
        if( $value < 25000){
          return 0;
        }elseif ( $value < 45584 & $value  > 25000 ) {
          return ($base_igr*10 /110 ) - (2273*$n_part);

        }elseif ( $value < 81584 ) {
          return ($base_igr*15/115)-(4076*$n_part);
        }elseif ($value<126584) {
          return $base_igr*20/120-(7031*$n_part);
        }elseif ($value<220334) {
          return $base_igr*25/125-(11250*$n_part);
        }elseif ($value<389084) {
          return $base_igr*35/135-(24306*$n_part);
        }elseif ($value<842167) {
          return $base_igr*45/145-(44181*$n_part);
        }else{
          return $base_igr*60/160-(98633*$n_part);
        }
    }

    static function personalData($data,$mois_default)
    {
        $n_part = 1;

        $carburant = ( Configuration::where('labelle','carburant')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('carburant') : 0   ;

        $prime = ( Configuration::where('labelle','prime')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('prime') : 0   ; 

        $conges = ( Configuration::where('labelle','conges')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('conges') : 0   ;

        $gratification = ( Configuration::where('labelle','gratification')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('gratification') : 0   ;

        $prime_ni = ( Configuration::where('labelle','prime_ni')->first()->level == 1 ) ? $data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('prime_ni') : 0   ;

        $avance = ( Configuration::where('labelle','avance')->first()->level == 1 ) ? $data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('avance') : 0 ;

        $communication = ( Configuration::where('labelle','communication')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('communication') : 0   ;

        $perdiem = ( Configuration::where('labelle','perdiem')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('perdiem') : 0   ; 

        $internet = ( Configuration::where('labelle','internet')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('internet') : 0   ; 

        $guide =  ( Configuration::where('labelle','guide')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('guide') : 0   ; 

        $transport = ( Configuration::where('labelle','transport')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('transport') : 0 ; 
        
        $mise_route = ( Configuration::where('labelle','mise_route')->first()->level == 1 ) ? @$data->paiesMois($mois_default)->whereYear('created_at',session('campagne'))->sum('mise_route') : 0 ;

        $salairebrute = 0 ;
        // $salairebrute = ( Configuration::where('labelle','salaire')->first()->level == 1 ) ? $data->fonction->salaire : 0 ;

        $salaireformationbrute = 0 ;
        // $salaireformationbrute = ( Configuration::where('labelle','salaire')->first()->level == 1 ) ? $data->fonction->s_formation : 0 ;

        $jour = round (30 - @$data->absMois(( isset($mois_default))? $mois_default : date('m') )->count() ,0);
        
        $b_fiscal = round( $salairebrute + $prime + $conges + $gratification,0 );

        $brut_fical_jour = round( ($b_fiscal*$jour)/30,0);

        $brut_social = $brut_fical_jour - $prime_ni;

        $is = round($brut_social* 0.012,0) ;

        $cn = round(Option::cn($brut_social),0) ;

        $base_igr = round(0.85 * ((0.8*$brut_social)-($is+$cn)),0)  ;

        $igr = round(Option::igr($base_igr,$n_part),0) ;

        $cnps = round($brut_social*0.063,0);
      
        if(true){
        // if(in_array($data->fonction->libelle, \App\Option::fonctions() )){
              $autreR = 0 ;
        }else{
              $autreR =  $is + $cn + $cnps + $igr ; 
        }

        // $salaire = $prime_ni + $brut_social - $autreR  - $avance;

        $salaire = $prime_ni + $brut_social - $autreR  - $avance;
        
        $netpayer = $salaire + $carburant +
        $communication + $perdiem + 
        $internet + $guide +
        $transport  +
        $mise_route ;

        $netpay = $netpayer;
        $netpayer =  $netpayer + Option::calcul_frais_mtn($netpayer);

        $netpayerformation =  $netpayer - $brut_social + $salaireformationbrute +$autreR;
        
        $netpayerformation = $netpayerformation + Option::calcul_frais_mtn($netpayerformation);
        

        return [
            'etat'=>$data->etat,
            'nom' => $data->nom.' '.$data->prenoms,
            'matricule'=> $data->matricule,
            'fonction'=> @$data->fonction->libelle,
            'mm'=> $data->mm_numero,
            'direction'=> @$data->direction->libelle,
            'jour'=>$jour,
            'b_fiscal'=>$b_fiscal,
            'brut_social'=>$brut_social,
            'salaireBrute'=> $salairebrute,
            'is'=>$is,
            'frais'=>Option::calcul_frais_mtn($netpay),
            'cn'=>$cn,
            'base_igr'=>$base_igr,
            'igr'=>$igr,
            'cnps'=>$cnps,
            'carburant' => $carburant,
            'prime_ni' => $prime_ni,
            'prime' => $prime,
            'conges' =>$conges,
            'gratification' =>$gratification,
            'avance' => $avance,
            'communication' => $communication,
            'perdiem' => $perdiem,
            'internet' => $internet,
            'guide' => $guide,
            'salairenet'=>$salaire,
            'salaire'=>$netpayer,
            'salaireformation'=>$netpayerformation,
            'salaireformationbrute'=>$salaireformationbrute,
            'transport'=>$transport,
            'mise_route'=>$mise_route,
            'brut_fical_jour'=>$brut_fical_jour,
            'perdiem'=>$perdiem,
        ];
    }

    protected function fichier(String $name,String $re,$request)
    {
        if ($request->hasFile($name)) 
        {
            $file = $request->file($name);
            $ext = $file->guessClientExtension();

            if (in_array($ext,['pdf'])) {
                $fileName = $re.date('d-m-Y-h-i-s').'.'.$file->getClientOriginalExtension();
                move_uploaded_file($file, 'fichiers/'.$fileName);
                
                # $file->move('/fichiers/',$fileName);
                $request[$re] = 'fichiers/'.$fileName;

                return 'fichiers/'.$fileName;
            }else{
                flash('Extension invalide')->error();
                return redirect()->back();
            }
        }
    }

    protected function newPersonnel($user)
    {
         
            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);

            @$beautymail->send('mails.newUser', ['user'=>$user], function($message) use ($user)
            {
                $message
                    ->from('dravrea@gmail.com','UBF')
                    ->to('dravrea@gmail.com','UBF')
                    ->subject('Nouvel Utilisateur sur UBF');
            });
    }
}
