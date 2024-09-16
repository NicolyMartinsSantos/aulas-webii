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
    return view('home');
})->name('home');

Route::get('/livro', 'App\Http\Controllers\LivroController@index')->name('livro.index');
Route::get('/livro/create', 'App\Http\Controllers\LivroController@create')->name('livro.create');
//Route::post('/eixo', 'App\Http\Controllers\EixoController@store')->name('eixo.store');
Route::get('/autor', 'App\Http\Controllers\AutorController@index')->name('autor.index');
Route::get('/autor/create', 'App\Http\Controllers\AutorController@create')->name('autor.create');
Route::post('/autor', 'App\Http\Controllers\AutorController@store')->name('autor.store');