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

Route::get('/', 'PagesController@index');
// Route::get('/about', 'PagesController@about');
// Route::get('/services', 'PagesController@services');


// Route::get('posts/', 'PostsController@index');
// Route::get('posts/{id}', 'PostsController@show');
// Route::get('posts/{id}', 'PostsController@create');
// Route::get('posts/{id}', 'PostsController@store');

Route::resource('posts', 'PostsController');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/download-pdf', 'PostsController@downloadPDF');

Route::get('/export-excel', 'PostsController@exportToExcel');
Route::get('/export-csv', 'PostsController@exportIntoCSV');