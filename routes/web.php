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

Route::resource('items', 'ItemController')
    ->except(['index', 'show']);
Route::resource('itementities', 'ItementityController')->except(['index']);
Route::resource('peoples', 'PeopleController');

Route::livewire('/', 'inventory.search')->name('inventory.search');
Route::livewire('/item/create', 'item.create')->name('item.create');
Route::livewire('/itementity/create', 'itementity.create')->name('itementity.create');