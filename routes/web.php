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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index');
Route::get('group/{id}', 'GroupController@index');

Route::post('newGroup', 'GroupController@create');
Route::post('updateGroup/{id}', 'GroupController@update');
Route::post('moveGroup', 'GroupController@move');
Route::get('deleteGroup/{id}', 'GroupController@delete');

Route::post('newItem', 'ItemController@create');
Route::post('updateItem/{id}', 'ItemController@update');
Route::post('moveItem', 'ItemController@move');
Route::get('cloneItem/{id}', 'ItemController@clone');
Route::get('deleteItem/{id}', 'ItemController@delete');

Route::post('newAppAddress', 'AppAddressController@create');
Route::post('updateAppAddress/{id}', 'AppAddressController@update');
Route::get('deleteAppAddress/{id}', 'AppAddressController@delete');

Route::post('newAppEmail', 'AppEmailController@create');
Route::post('updateAppEmail/{id}', 'AppEmailController@update');
Route::get('deleteAppEmail/{id}', 'AppEmailController@delete');

Route::post('newAppPhone', 'AppPhoneController@create');
Route::post('updateAppPhone/{id}', 'AppPhoneController@update');
Route::get('deleteAppPhone/{id}', 'AppPhoneController@delete');

Route::post('newAppWebsite', 'AppWebsiteController@create');
Route::post('updateAppWebsite/{id}', 'AppWebsiteController@update');
Route::get('deleteAppWebsite/{id}', 'AppWebsiteController@delete');


Route::post('newAppTask', 'AppTaskController@create');
Route::post('updateAppTask/{id}', 'AppTaskController@update');
Route::post('toggleAppTask/{id}', 'AppTaskController@toggle');
Route::get('cloneAppTask/{id}', 'AppTaskController@clone');
Route::get('deleteAppTask/{id}', 'AppTaskController@delete');

Route::post('newAppTextfield', 'AppTextfieldController@create');
Route::post('updateAppTextfield/{id}', 'AppTextfieldController@update');
Route::get('deleteAppTextfield/{id}', 'AppTextfieldController@delete');
