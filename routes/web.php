<?php

use App\Http\Controllers\BookController;
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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/books'       , 'BookController@index');
Route::get('books/create' , 'BookController@create');
Route::post('books/store' , 'BookController@store');
Route::get('books/edit/{id}', "BookController@edit" );
Route::post('books/update/{id}', "BookController@update" );
Route::get('books/delete/{id}', "BookController@delete" );


Route::get('/books/show/{id}'  , 'BookController@show');
