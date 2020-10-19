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

Route::livewire('/', 'inventory.search')->name('inventory.search');
Route::livewire('/item/create', 'item.create')->name('item.create');
Route::livewire('/item/{item}', 'item.show')->name('item.show');
Route::livewire('/itementity/create', 'itementity.create')->name('itementity.create');
Route::livewire('/itementity/{itementity}', 'itementity.show')->name('itementity.show');
Route::livewire('/itementity/{itementity}/refill', 'itementity.refill')->name('itementity.refill');
Route::livewire('/itementity/{itementity}/checkout', 'itementity.checkout')->name('itementity.checkout');
Route::livewire('/storagelocation/{storagelocation}/edit', 'storagelocation.edit')->name('storagelocation.edit');
