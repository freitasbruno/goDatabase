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
//Route::get('group/{$id}', 'GroupController@index');

Route::get('group/{group_id}', function ($id) {
	session(['currentGroup' => $id]);
    $groups = Group::where('id_parent', $id)->get();
    return view('home', array('groups'=>$groups));
});

Route::post('newGroup', 'GroupController@create');
