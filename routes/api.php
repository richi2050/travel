<?php



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

Route::post('login','Auth\LoginController@login');

Route::post('prueba','HomeController@prueba')->name('token');

Route::group(['middleware' => ['token']], function () {

    Route::resource('travel','Api\TravelController');
    Route::resource('project','Api\ProjectController');
    Route::resource('subproject','Api\SubProjectController');

});


