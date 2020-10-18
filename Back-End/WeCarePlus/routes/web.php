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
Route::get('add','PatientController@create');
Route::post('add','PatientController@register');
Route::get('patient','PatientController@PatientIndex');
Route::get('edit/{id}','PatientController@edit');
Route::post('edit/{id}','PatientController@update');
Route::delete('{id}','PatientController@destroy');


