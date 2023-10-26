<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('pdffile', 'PdfController@pdfForm');

Auth::routes(['verify' => false]);

Route::get('/', function ()
{
   return redirect()->route('admin');
})->name('index');

Route::get('/authenticate/{id}', 'LoginController@index')->name('authenticate.index');
Route::get('/auth/{uuid}', 'LoginController@auth')->name('authenticate.auth');

Route::get('listfrss', 'FournisseurController@list_frss')->name('list.frss');
Route::get('persorecrut', 'PersoRecrutController@index')->name('perso.recrut.index');

/* 
Route::get('/user/{id}', function (string $id) {
	// ...
})->whereUuid('id');
*/


// Auth routes
Route::group(['middleware' => ['auth','checkUser'],'prefix'=>'tableau-bord'], function() {
	// Route::get('test', function ()
	// {
	// 	return view('admin.test');
	// });

	Route::get('/', 'TableaubordController@index')->name('admin');
	Route::post('campagne', "CampagneController@store")->name('campagne');
	Route::post('direction', "DirectionController@get")->name('direction');
	// Admin Access
	Route::group(['middleware'=>'permission_controller'], function ()
	{
		Route::get('exportPaie', 'PaieController@export')->name('exportPaie'); 

		Route::get('personnels/export/{id?}/{team_id?}', 'PersonnelController@export')->name('export.all.personnels');

		Route::get('personnels/attente', 'PersonnelController@attente')->name('personnels.attente');
		Route::get('personnels/formation', 'PersonnelController@formation')->name('personnels.formation');
		Route::post('prime','PaieController@prime')->name('prime');			

		Route::get('template/attente', function() {
			return Storage::download('template_attente.xlsx');
		})->name('template.attente');

		Route::get('template/attente/formation', function() {
			return Storage::download('template_attente_formation.xlsx');
		})->name('template.attente.formation');

		Route::get('personnels/importFormation','PersonnelController@importFormation')->name('personnels.import.formation');
		Route::post('personnels/importFormation', 'PersonnelController@postFormation')->name('personnels.post.formation');

		Route::get('personnels/importAttente','PersonnelController@importAttente')->name('personnels.import.attente');
		Route::post('personnels/importAttente', 'PersonnelController@postAttente')->name('personnels.post.attente');
		
		Route::post('personnels/activeActivite','PersonnelController@activeActivite')->name('personnels.active.activite');
		// Route::put('personnels/destroyLog','PersonnelController@destroyLog')->name('personnels.destroyLog');


		Route::post('personnels/modifier', 'PersonnelController@modifier')->name('personnels.modifier');


		Route::get('paies/list', 'PaieController@list')->name('paie.list');

		// Configuration
		Route::get('configuration', 'ConfigurationController@index')->name('config.index');
		Route::resource('configs', 'ConfigurationController');

		Route::resource('roles','RoleController');
		Route::resource('permissions','PermissionController');
		Route::resource('users','UserController');
		Route::resource('personnels','PersonnelController');

		Route::get('fournisseurs/import','FournisseurController@import')->name('fournisseurs.import');
		Route::post('fournisseurs/import', 'FournisseurController@importPost')->name('fournisseurs.post.import');
		Route::get('template/fournisseurs', function(){
			return Storage::download('template_fournisseurs.xlsx');
		})->name('template.fournisseurs');

		Route::resource('fournisseurs','FournisseurController');

		Route::resource('caisses','CaisseController');
		Route::resource('portefeuilles','PortefeuilleController');
		Route::resource('depenses','DepenseController');
		Route::resource('budgets','BudgetController');
		Route::resource('abscences','AbscenceController');
		Route::resource('formations','FormationController');
		Route::resource('paies','PaieController');
		
		Route::resource('directions','DirectionController');
		
		Route::get('imputations', 'CaisseController@getImputation')->name('imputation');
		Route::get('lignebudget', 'CaisseController@getBudget')->name('lignebudget');

		// Import & Export Exel Personnels
		Route::get('export', 'PersonnelController@export')->name('export');

		// Export Depense
		Route::get('exportDepense', 'DepenseController@export')->name('depenses.export');
		// Export Budget
		Route::get('exporBudget', 'BudgetController@export')->name('budgets.export');

		Route::get('importExportView', 'PersonnelController@importExportView')->name('personnels.import');
		Route::post('import', 'PersonnelController@import')->name('import');
		Route::get('downloadTemplate', function() {
			return Storage::download('template_Personnels.xlsx');
		})->name('template');

		// PDF downlaod
		Route::get('pdf_download', 'PdfController@pdfDownload')->name('pdf');

		// Recap
		Route::get('recap', 'RecapController@index')->name('recap');

		// PDF OM
		Route::get('pdf_om/{id}/downlaod2', 'PdfController@pdfOm2')->name('pdfom2');
		Route::get('pdf_om/{id}/downlaod1', 'PdfController@pdfOm1')->name('pdfom1');

		Route::get('pdf_om/{id}/downlaod/{team_id?}', 'PdfController@pdfOm')->name('pdfom');
		Route::get('pdfom/{direction_id}/{team_id?}', 'PdfController@pdfOrdreMission')->name('pdfordremission');
		Route::get('generateallompdf/{team_id}', 'PdfController@generateallompdf')->name('personnels.generateallompdf');

		// Assignation Direction
		Route::post('directionset', 'UserController@directionset')->name('setDirection');

		// Export/Telechargement
		Route::get('exportpaiement', 'ExportController@paiement')->name('export.paiements');
		Route::post('exportpaiement', 'PdfController@pdfDownload')->name('export.paiements');
		Route::get('exportpersonnels', 'ExportController@personnel')->name('export.personnels');
		Route::POST('exportpersonnels', 'ExportController@downloadPersonnel')->name('export.personnels');


		// affectation
		Route::get('affactation/supprimer/{id}', 'AffectationController@supprimer')->name('supprimer.affectation');
		
	});

	
});
