<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'InventoryController@index')->name('listItementities');
Route::get('/init', 'TestController@init');

Route::get('/item/create', 'InventoryController@createItemForm')->name('createItem');
Route::post('/item/create', 'InventoryController@createItem')->name('createItemPost');
Route::get('/itementity/create', 'InventoryController@createItementityForm')->name('createItementity');
Route::post('/itementity/create', 'InventoryController@createItementity')->name('createItementityPost');
Route::get('/people/create', 'InventoryController@createPeopleForm')->name('createPeople');
Route::post('/people/create', 'InventoryController@createPeople')->name('createPeoplePost');

