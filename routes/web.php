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

Route::get('/', 'InventoryController@index')->name('inventory.index');
Route::get('/init', 'TestController@init');

Route::resource('items', 'ItemController')
    ->except(['index', 'show']);
Route::resource('itementities', 'ItementityController')->except(['index']);
Route::resource('peoples', 'PeopleController');

