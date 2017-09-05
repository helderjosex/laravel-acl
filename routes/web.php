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

Route::group(['prefix' => 'painel'], function(){

//PostController
Route::get('posts', 'PostController@index')->name('posts');	
// PermissionController
Route::get('permissions', 'PermissionController@index')->name('permissions');
// RoleController	
Route::get('roles', 'RoleController@index')->name('roles');
Route::get('roles/{id}/permissions', 'RoleController@permissions')->name('roles-permissions');
// UserController	
Route::get('users', 'UserController@index')->name('users');	

Route::get('/', 'PainelController@index');	
});	

//Route::get('/', 'HomeController@index');
Route::get('/', 'PainelController@index');

Auth::routes();