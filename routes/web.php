<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('beginin');

Route::post('/home', 'AuthController@store')->name('auth.store');


Route::group(['middleware' => ['auth.session']], function () {
    Route::get('/home', 'AuthController@index')->name('auth.index');
    Route::get('/prueba', 'PruebaController@prueba')->name('prueba');
    Route::get('auth/logout','AuthController@logout')->name('logout_exter');

});
