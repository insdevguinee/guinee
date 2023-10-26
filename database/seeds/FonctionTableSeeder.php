<?php

use Illuminate\Database\Seeder;

class FonctionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $_fonctions = [
        [
            0=>'agent tic',
            1=>100000,
        ],
        [
            0=>'assistant tic',
            1=>250000,
        ],
        [
            0=>'chef d\'équipe recensement',
            1=>150000,
        ],
        [
            0=>'agent recensement',
            1=>120000,
        ],
        [
            0=>'chef d\'équipe codification et saisie',
            1=>180000,
        ],
        [
            0=>'superviseur',
            1=>400000,
        ],
        [
            0=>'agent codification et saisie',
            1=>150000,
        ],
        [
            0=>'archiviste',
            1=>250000,
        ],
        [
            0=>'chef équipe manutantion',
            1=>150000,
        ],
        [
            0=>'agent manutantion',
            1=>90000,
        ],
        [
            0=>'personnel assistant administratif',
            1=>350000,
        ],
        [
            0=>'personnel assistant logistique',
            1=>350000,
        ],
        [
            0=>'personnel assistant comptable',
            1=>350000,
        ],
        [
            0=>'personne specialiste en communication',
            1=>350000,
        ],
        [
            0=>'personnel call center',
            1=>250000,
        ],
        [
            0=>'agent de reprographie',
            1=>150000,
        ],
        [
            0=>'autre personnel d\'appui',
            1=>100000,
        ],
        [
            0=>'agent de saisie',
            1=>100000,
        ],
    ];
    public function run()
    {
    	
    	foreach ($this->_fonctions as $fonction) {
    		DB::table('fonctions')->insert(array(
	            'libelle' => $fonction[0],
                'salaire' => $fonction[1],
	        ));
    	}
        
    }
}
