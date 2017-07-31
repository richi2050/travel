<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('beginin');

Route::post('/home', 'AuthController@store')->name('auth.store');

Route::get('/func', 'PruebaController@func');

Route::group(['middleware' => ['auth.session']], function () {
    Route::get('/home', 'AuthController@index')->name('auth.index');
    Route::get('/prueba', 'PruebaController@prueba')->name('prueba');
    Route::get('auth/logout','AuthController@logout')->name('logout_exter');
    Route::get('list/business','BusinessController@lista')->name('list');
    Route::get('generate/business','BusinessController@generateBusiness')->name('busine_select');

    /* Inicio de rutas  de menus*/

    Route::get('business/process','RoutingController@businessProcess')->name('business_process');
    Route::get('travel/authorization','RoutingController@travelAuthorization')->name('travel_autho');
    Route::get('solicitud/travel','RoutingController@solicitudTravel')->name('solicitud_travel');


    /* Fin de rutas  de menus*/
    Route::resource('project','ProjectWebController');
    Route::get('list/project','ProjectExtendController@list_project')->name('list_project');
    Route::resource('subproject','SubProjectWebController');
    Route::resource('travel','TravelWebController');

    Route::get('prueba','PruebaController@prueba');

});
