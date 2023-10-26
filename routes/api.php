<?php

use Illuminate\Http\Request;
use App\Http\Controllers\FournisseursAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::namespace('Api')->group(function ()
// {
// 	Route::get('/objets', 'ApiController@objets');
// 	Route::get('/objet/{id}','ApiController@objetsShow');
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('fournisseurs', FournisseursAPIController::class);
Route::resource('fournisseurs','FournisseursAPIController');
