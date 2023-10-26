<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersoRecrut extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'recrut_personne_recrut';
    protected $fillable = [
        'codeProjet', 'NomProjet', 'titre_poste', 'departement', 'departement2', 'departement3', 'departement4', 'sousprefecture', 'sousprefecture2', 'sousprefecture3', 
        'sousprefecture4', 'possedeNumTel', 'nomtuteurlegal', 'nomtuteurlegal2', 'namepere', 'namemere', 'isDisponible', 'hasAcceptDisponible', 'hasexpcollecte', 'exp_structure', 
        'exp_annee', 'exp_intitule_poste', 'exp_intitule_projet', 'date_jour_decla', 'declarahonneur', 'confirmlieuaffectation', 'codebonneconduite', 'contrat', 'numero_cni', 'type_piece', 
        'name', 'last_name', 'choix_projet', 'date_naiss', 'lieu_naiss', 'sexe', 'niveau_etude', 'last_diplome', 'status', 'email', 
        'contact1', 'contact2', 'contact3', 'first_langue_nat', 'second_langue_nat', 'third_langue_nat', 'photo', 'cv', 'doc_last_diplome', 'cni', 'cnituteur',
        'id_projet', 'name', 'last_name', 'date_naiss', 'lieu_naiss', 'certifmedical','certifresidence','matricule','casier' , 'is_admited', 'admited_at','note', 'note2','rank', 'fonction_id'
    ];
}
