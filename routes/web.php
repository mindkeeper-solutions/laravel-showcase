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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('cards/{card}.svg', 'CardController@generate_svg')->name('cards.generate_svg');
Route::get('cards/{card}/toggle-allowance', 'CardController@toggle_allowance')->name('cards.toggle_allowance');
Route::resource('cards', 'CardController');


