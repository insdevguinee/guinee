<?php

use Illuminate\Database\Seeder;

class DirectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $_directions = ['abidjan','yamoussoukro','san-pedro','bouaké','gagnoa','korogho','man','abengourou','aboiso','odienne'];
    public function run()
    {
    	
    	foreach ($this->_directions as $direction) {
    		DB::table('directions')->insert(array(
	            'libelle' => $direction,
	        ));
    	}
        
    }
}
