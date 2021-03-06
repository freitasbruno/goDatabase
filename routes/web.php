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

Route::get('/test', function () {
    $collection = collect([2, 4, 6, 8, 4]);
    return $collection->search(4);
});

Route::post('search', 'SearchController@search');

Route::get('dashboard', 'HomeController@index');

Route::post('updateGroup/{id}', 'GroupController@update');
Route::post('moveGroup', 'GroupController@move');
Route::post('shareGroup', 'GroupController@share');
Route::get('deleteGroup/{id}', 'GroupController@delete');
Route::get('restoreGroup/{id}', 'GroupController@restore');
Route::resource('groups', 'GroupController');

Route::post('newItem', 'ItemController@create');
Route::post('updateItem/{id}', 'ItemController@update');
Route::post('moveItem', 'ItemController@move');
Route::post('shareItem', 'ItemController@share');
Route::get('cloneItem/{id}', 'ItemController@clone');
Route::get('deleteItem/{id}', 'ItemController@delete');
Route::get('restoreItem/{id}', 'ItemController@restore');

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

Route::post('newAppTextarea', 'AppTextareaController@create');
Route::post('updateAppTextarea/{id}', 'AppTextareaController@update');
Route::get('deleteAppTextarea/{id}', 'AppTextareaController@delete');

Route::post('newAppImage', 'AppImageController@create');
Route::post('updateAppImage/{id}', 'AppImageController@update');
Route::get('deleteAppImage/{id}', 'AppImageController@delete');

Route::post('newAppFile', 'AppFileController@create');
Route::post('updateAppFile/{id}', 'AppFileController@update');
Route::get('deleteAppFile/{id}', 'AppFileController@delete');

Route::post('addTeamMembers', 'TeamController@addTeamMembers');
Route::get('exitTeam/{id}', 'TeamController@removeTeamMember');
Route::get('deleteTeam/{id}', 'TeamController@destroy');
Route::resource('teams', 'TeamController');
