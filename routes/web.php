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

// Route::get('/', function () {
//     return view('home');
// });
# IsAdmin MIDDLEWARE
Route::middleware(['IsAdmin'])->group(function () {
  #books create from admin
    Route::get('books/create' , 'BookController@create');
    Route::post('books/store' , 'BookController@store');
    #authors create from admin
    Route::get('authors/create' , 'AuthorController@create');
    Route::post('authors/store' , 'AuthorController@store');
});

# Error Page
Route::get('error', function(){return "ERROR NOT AUTH";});

#books routes
Route::get('/books', 'BookController@index');
Route::get('books/edit/{id}', "BookController@edit" );
Route::post('books/update/{id}', "BookController@update" );
Route::get('books/delete/{id}', "BookController@delete" );
Route::get('/books/show/{id}'  , 'BookController@show');

#authors routes
Route::get('authors' , 'AuthorController@index');
Route::get('authors/show/{id}' , 'AuthorController@show');

// Register and login
Route::get('users/register' , 'UserController@register');
Route::post('users/store' , 'UserController@store');
Route::get('users/login' , 'UserController@login');Route::post('users/handelLogin',
'UserController@handelLogin');

#Dashboard
Route::get('dashboard','HomeController@dashboard');

#Github links

Route::get('auth/github', 'UserController@github' );

Route::get('auth/callback', 'UserController@githubCallBack' );