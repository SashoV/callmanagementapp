<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', 'MainController@index')->name('home');

Route::get('/import', 'ImportCsvController@index')->name('fileImport');

Route::post('/import', 'ImportCsvController@csvImport')->name('csvImport');

Route::get('/call/create', 'CallController@create')->name('createCall');
Route::post('/call', 'CallController@store')->name('storeCall');
Route::get('/call/{id}', 'CallController@show')->name('call');
Route::get('/call/{id}/edit', 'CallController@edit')->name('editCall');
Route::put('/call/{id}', 'CallController@update')->name('updateCall');
Route::delete('/call/{id}', 'CallController@destroy')->name('deleteCall');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/{user}', 'UserController@show')->name('user');
