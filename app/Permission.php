<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{

	public static function getModels()
	{
		return ['users','permissions','roles','personnels','access_admin','all_personnels','all_caisses','directions','caisses','budgets','imputations','depenses','fournisseurs','portefeuilles','downloads','abscences','paies'];
	}

	public static function defaultPermissions()
	{
	    		return [
	    			'access_admin',
	    			'all_personnels',
	    			'all_caisses',

		    		'view_users',
			        'add_users',
			        'edit_users',
			        'delete_users',

			        'view_all_caisses',
					'add_all_caisses',
					'edit_all_caisses',
					'delete_all_caisses',

			        'view_permissions',
			        'add_permissions',
			        'edit_permissions',
			        'delete_permissions',

					'view_roles',
					'add_roles',
					'edit_roles',
					'delete_roles',
					
					'view_personnels',
					'add_personnels',
					'edit_personnels',
					'delete_personnels',

					'view_directions',
					'add_directions',
					'edit_directions',
					'delete_directions',

					'view_caisses',
					'add_caisses',
					'edit_caisses',
					'delete_caisses',

					'view_budgets',
					'add_budgets',
					'edit_budgets',
					'delete_budgets',

					'view_imputations',
					'add_imputations',
					'edit_imputations',
					'delete_imputations',

					'view_all_personnels',
					'add_all_personnels',
					'edit_all_personnels',
					'delete_all_personnels',

					'view_depenses',
					'add_depenses',
					'edit_depenses',
					'delete_depenses',

					'view_fournisseurs',
					'add_fournisseurs',
					'edit_fournisseurs',
					'delete_fournisseurs',

					'view_portefeuilles',
					'add_portefeuilles',
					'edit_portefeuilles',
					'delete_portefeuilles',

					'view_downloads',
					'add_downloads',
					'edit_downloads',
					'delete_downloads',
					'xlsPaies_downloads',
					'pdfPaies_downloads',

					'view_abscences',
					'add_abscences',
					'edit_abscences',
					'delete_abscences',

					'view_paies',
					'add_paies',
					'edit_paies',
					'delete_paies',

					'view_directions',
					'add_directions',
					'edit_directions',
					'delete_directions',
		        ];
	}
}
