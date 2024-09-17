<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
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

// Route::get('/livro', 'c@index')->name('livro.index');
// Route::post('/livro/create', 'App\Http\Controllers\LivroController@create')->name('livro.create');
// Route::post('/livro/edit', 'App\Http\Controllers\LivroController@edit')->name('livro.edit');
// Route::get('/livro/show', 'App\Http\Controllers\LivroController@show')->name('livro.show');
// Route::post('/livro', 'App\Http\Controllers\livroController@store')->name('livro.store');

Route::resource('/livro', 'App\Http\Controllers\LivroController');
Route::resource('/autor', 'App\Http\Controllers\AutorController');

// Route::get('/autor', 'App\Http\Controllers\AutorController@index')->name('autor.index');
// Route::post('/autor/create', 'App\Http\Controllers\AutorController@create')->name('autor.create');
// Route::post('/autor/edit', 'App\Http\Controllers\AutorController@edit')->name('autor.edit');
// Route::get('/autor/show', 'App\Http\Controllers\AutorController@show')->name('autor.show');
// Route::post('/autor', 'App\Http\Controllers\AutorController@store')->name('autor.store');