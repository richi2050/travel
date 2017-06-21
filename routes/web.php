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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/business', 'BusinessController@index')->name('business');

Route::get('/project','ProjectController@index')->name('project');

Route::resource('/project', 'ProjectController');
Route::resource('/sub_project', 'SubProjectController');
Route::resource('/travel', 'TravelController');
Route::get('/list_project', 'ProjectController@ListProject')->name('list_project');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("autocomplete",'HomeController@autocomplete')->name('autocomplete');
